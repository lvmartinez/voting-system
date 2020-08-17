<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNominationRequest;
use App\Http\Requests\UpdateNominationRequest;
use App\Models\Category;
use App\Models\Nomination;
use App\Models\NominationUser;
use App\Repositories\NominationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Auth;
use Flash;
use Response;

class NominationController extends AppBaseController
{
    /** @var  NominationRepository */
    private $nominationRepository;

    public function __construct(NominationRepository $nominationRepo)
    {
        $this->nominationRepository = $nominationRepo;
    }

    /**
     * Display a listing of the Nomination.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $nominations = $this->nominationRepository->all();

        return view('nominations.index')
            ->with('nominations', $nominations);
    }

    /**
     * Show the form for creating a new Nomination.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');;
        return view('nominations.create')->with('categories', $categories);
    }

    /**
     * Store a newly created Nomination in storage.
     *
     * @param CreateNominationRequest $request
     *
     * @return Response
     */
    public function store(CreateNominationRequest $request)
    {

       $input = $request->all();

       $input['user_id']=Auth::user()->id;
       $nominationsCheck = Nomination::where('name',$request->input('name') )
                ->where('name',$request->input('category_id') )->first();

        if ($nominationsCheck){

            if ($nominationsCheck['user_id'] != Auth::user()->id) {

                $no_of_nominations = $nominationsCheck['no_of_nominations'];
                $input['no_of_nominations'] = $no_of_nominations + 1;
                $this->nominationRepository
                    ->update(['no_of_nominations' => $input['no_of_nominations']], $nominationsCheck['id']);
                NominationUser::create([
                    'user_id' => $input['user_id'],
                    'category_id' => $input['category_id'],
                    'nomination_id' => $nominationsCheck['id']
                ]);

            }
        }else{
            $input['no_of_nominations'] = 1;
            $this->validate($request,[
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);

            $image = $request->file('image');
            $input = $request->all();
            $input['user_id'] = Auth::user()->id;

            if ($image != null) {
                $imageName = $image->getClientOriginalName();
                $input['image']= $imageName;
                $destPath = public_path('storage/upload/images/nomination');
            }

            $nomination = $this->nominationRepository->create($input);

            if ($nomination && $image != null){
                $image->move($destPath, $nomination->id."_".$imageName);
            }

            NominationUser::create([
                'user_id' => $input['user_id'],
                'category_id' => $input['category_id'],
                'nomination_id' => $nomination->id
            ]);
        }

        Flash::success('Nomination submitted successfully.');

        //return redirect('home');
        return redirect()->back();
        //return redirect(route('nomination.index'));
    }

    /**
     * Display the specified Nomination.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nomination = $this->nominationRepository->find($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        return view('nominations.show')->with('nomination', $nomination);
    }

    /**
     * Show the form for editing the specified Nomination.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nomination = $this->nominationRepository->find($id);
        $categories = Category::pluck('name', 'id');

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        return view('nominations.edit')->with('nomination', $nomination)
            ->with('categories', $categories);
    }

    /**
     * Update the specified Nomination in storage.
     *
     * @param int $id
     * @param UpdateNominationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNominationRequest $request)
    {

        $nomination = $this->nominationRepository->find($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);


        $image = $request->file('image');
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        if ($image != null) {
            $imageName = $image->getClientOriginalName();
            $input['image']= $imageName;
            if ($nomination){
                $destPath = public_path('storage/upload/images/nomination');
                $image->move($destPath, $nomination->id."_".$imageName);
            }
        }

        $nomination = $this->nominationRepository->update($input, $id);

        Flash::success('Nomination updated successfully.');

        return redirect(route('nominations.index'));
    }

    /**
     * Remove the specified Nomination from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nomination = $this->nominationRepository->find($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        $this->nominationRepository->delete($id);

        Flash::success('Nomination deleted successfully.');

        return redirect(route('nominations.index'));
    }
}
