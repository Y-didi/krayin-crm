<?php

namespace Webkul\Admin\Http\Controllers\Consultants;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Event;
use Illuminate\View\View;
use Prettus\Repository\Criteria\RequestCriteria;
use Webkul\Admin\DataGrids\Consultant\ConsultantDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Http\Requests\AttributeForm;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Resources\ConsultantResource;
use Webkul\Consultant\Repositories\ConsultantRepository;

class ConsultantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected ConsultantRepository $consultantRepository)
    {
        request()->request->add(['entity_type' => 'consultants']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|JsonResponse
    {
        if (request()->ajax()) {
            return datagrid(ConsultantDataGrid::class)->process();
        }

        return view('admin::consultants.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin::consultants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeForm $request)
    {
        Event::dispatch('consutlant.create.before');

        $consultant = $this->consultantRepository->create($request->all());

        Event::dispatch('consultant.create.after', $consultant);

        session()->flash('success', trans('admin::app.consultants.index.create-success'));

        return redirect()->route('admin.consultants.index');
    }

    /**
     * Show the form for viewing the specified resource.
     */
    public function view(int $id): View
    {
        $consultant = $this->consultantRepository->findOrFail($id);

        return view('admin::consultants.view', compact('consultant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View|JsonResponse
    {
        $consultant = $this->consultantRepository->findOrFail($id);

        return view('admin::consultants.edit', compact('consultant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributeForm $request, int $id)
    {
        Event::dispatch('consultant.update.before', $id);

        $consultant = $this->consultantRepository->update($request->all(), $id);

        Event::dispatch('consultant.update.after', $consultant);

        if (request()->ajax()) {
            return response()->json([
                'message' => trans('admin::app.consultant.index.update-success'),
            ]);
        }

        session()->flash('success', trans('admin::app.consultant.index.update-success'));

        return redirect()->route('admin.consultants.index');
    }


    /**
     * Search product results
     */
    public function search(): JsonResource
    {
        $consultant = $this->consultantRepository
            ->pushCriteria(app(RequestCriteria::class))
            ->all();

        return ConsultantResource::collection($consultant);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $consultant = $this->consultantRepository->findOrFail($id);

        try {
            Event::dispatch('settings.consultants.delete.before', $id);

            $consultant->delete($id);

            Event::dispatch('settings.consultants.delete.after', $id);

            return new JsonResponse([
                'message' => trans('admin::app.consultant.index.delete-success'),
            ], 200);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'message' => trans('admin::app.consultant.index.delete-failed'),
            ], 400);
        }
    }

    /**
     * Mass Delete the specified resources.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $indices = $massDestroyRequest->input('indices');

        foreach ($indices as $index) {
            Event::dispatch('product.delete.before', $index);

            $this->consultantRepository->delete($index);

            Event::dispatch('product.delete.after', $index);
        }

        return new JsonResponse([
            'message' => trans('admin::app.products.index.delete-success'),
        ]);
    }
}
