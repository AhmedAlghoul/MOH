@extends('cms.parent')

@section('title','مفتاح كادر التمريض')

@section('styles')
<style>
    .card-title {
        font-size: 20px;
        font-weight: bold;
        float: right;
    }

    .card-header>.card-tools {
        float: left;
    }
</style>
@endsection


@section('page-name','مفتاح كادر التمريض')

@section('small-page-name','مفتاح كادر التمريض')



@section('content')

<a href="{{Route('cms.addnurseskey')}}" style="margin-right: 20px; margin-bottom: 10px;" type="button"
    class="btn btn-primary">إضافة</a>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">مفاتيح كادر التمريض</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>183</td>
                                <td>John Doe</td>
                                <td>11-7-2014</td>
                                <td>Approved</td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr class="expandable-body d-none">
                                <td colspan="5">
                                    <p style="display: none;">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                        with
                                        the release of Letraset sheets containing Lorem Ipsum passages, and more
                                        recently
                                        with desktop publishing software like Aldus PageMaker including versions of
                                        Lorem
                                        Ipsum.
                                    </p>
                                </td>
                            </tr>
                            <tr data-widget="expandable-table" aria-expanded="true">
                                <td>219</td>
                                <td>Alexander Pierce</td>
                                <td>11-7-2014</td>
                                <td>Pending</td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr class="expandable-body">
                                <td colspan="5">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                        with
                                        the release of Letraset sheets containing Lorem Ipsum passages, and more
                                        recently
                                        with desktop publishing software like Aldus PageMaker including versions of
                                        Lorem
                                        Ipsum.
                                    </p>
                                </td>
                            </tr>
                            <tr data-widget="expandable-table" aria-expanded="true">
                                <td>657</td>
                                <td>Alexander Pierce</td>
                                <td>11-7-2014</td>
                                <td>Approved</td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr class="expandable-body">
                                <td colspan="5">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                        with
                                        the release of Letraset sheets containing Lorem Ipsum passages, and more
                                        recently
                                        with desktop publishing software like Aldus PageMaker including versions of
                                        Lorem
                                        Ipsum.
                                    </p>
                                </td>
                            </tr>
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>175</td>
                                <td>Mike Doe</td>
                                <td>11-7-2014</td>
                                <td>Denied</td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr class="expandable-body d-none">
                                <td colspan="5">
                                    <p style="display: none;">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                        with
                                        the release of Letraset sheets containing Lorem Ipsum passages, and more
                                        recently
                                        with desktop publishing software like Aldus PageMaker including versions of
                                        Lorem
                                        Ipsum.
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

</div>
</section>
@endsection


@section('scripts')


<!--jQuery ui-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
    integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


@endsection