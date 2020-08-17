<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use Response;
use App\Models\Nomination;
use App\Models\NominationUser;
use App\Models\Voting;

class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepository->all();

        if (Auth::user()->role_id == 4){
            return view('categories.election-index')
                ->with('categories', $categories);
        }
        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {

        $this->validate($request,[
           'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
        $image = $request->file('image');
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        if ($image != null) {
            $imageName = $image->getClientOriginalName();
            $input['image']= $imageName;
            $destPath = public_path('storage/upload/images/category');
        }

        $category = $this->categoryRepository->create($input);
        if ($category && $image != null){
            $image->move($destPath, $category->id."_".$imageName);
        }


        Flash::success('Category saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);
        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $nominations = Nomination::where('category_id', $id)->get();
        $nominationsSelected = Nomination::where('is_admin_selected', 1)
            ->where('category_id', $id)->get();
        $sum_no_of_nominations = Nomination::where('category_id', $id)->sum('no_of_nominations');
        $totalVotes = Nomination::where('category_id', $id)->sum('no_of_votes');
        //check if someone nominated someone before
        $hasNominatedBefore = 0;
        $nominationUser = NominationUser::where('user_id', Auth::user()->id)
                                        ->where('category_id', $id)->first();
        $nomination = Nomination::find($nominationUser['nomination_id']);
        $checkVoted = Voting::where('user_id', Auth::user()->id)
            ->where('category_id', $category->id)->first();

        if($checkVoted) Flash::success('You have voted before.');
            elseif($nominationUser) Flash::error('Nomination already filled');

        if($nominationUser || $checkVoted){
            $hasNominatedBefore = 1;
        }

        $nextCat = Category::where('id','>', $category->id)->first();
        $prevCat = Category::where('id','<', $category->id)->orderBy('id','desc')->first();
        $view = 'categories.show';
        if (Auth::user()->role_id == 4){
            $view='categories.election-show';
        }

        return view($view)->with('category', $category)
            ->with('totalVotes',$totalVotes)
            ->with('checkVoted',$checkVoted)
            ->with('nomination',$nomination)
            ->with('hasNominatedBefore',$hasNominatedBefore)
            ->with('nominations', $nominations)
            ->with('nominationsSelected',$nominationsSelected)
            ->with('sum_no_of_nominations',$sum_no_of_nominations)
            ->with('nextCat',$nextCat)
            ->with('prevCat',$prevCat);
        /*return view('categories.show')->with('category', $category)
            ->with('totalVotes',$totalVotes)
            ->with('checkVoted',$checkVoted)
            ->with('nominations', $nominations)
            ->with('nominationsSelected',$nominationsSelected)
            ->with('sum_no_of_nominations',$sum_no_of_nominations);*/

    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param int $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
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
            if ($category){
                $destPath = public_path('storage/upload/images/category');
                $image->move($destPath, $category->id."_".$imageName);
            }
        }

        $category = $this->categoryRepository->update($input, $id);

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route('categories.index'));
    }
}
