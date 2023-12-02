<x-rtl.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.css'])
        @vite(['resources/rtl/scss/light/plugins/table/datatable/dt-global_style.scss'])
    </x-slot>

    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table id="ecommerce-list" class="table dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم المستخدم</th>
                                    <th>رقم الهاتف</th>
                                    <th>البريد الالكتروني</th>
                                    <th>اسم المعلم</th>
                                    <th>المستوى الدراسي</th>
                                    <th>ملاحظات</th>
                                    <th>خيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($researchRequests as $researchRequest)
                                    <tr>
                                        <td>{{ $researchRequest->id }}</td>
                                        <td>{{ $researchRequest->user->name }}</td>
                                        <td>{{ $researchRequest->phone }}</td>
                                        <td>{{ $researchRequest->user->email }}</td>
                                        <td>{{ $researchRequest->teacher_name }}</td>
                                        <td>{{ $researchRequest->educationLevel->name_ar }}</td>
                                        <td>{{ $researchRequest->notes }}</td>
                                        <td>
                                            <a class="btn btn-success">asdsda</a>
                                            <a class="btn btn-success">asdsda</a>
                                            <a class="btn btn-success">asdsda</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot:footerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.js'])
    </x-slot>

</x-rtl.base-layout>
