@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>


            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Rollbar Test</h3>
                </div>
                <div class="panel-body">
                    <form id="rollbar-test" class="ajax" action="{{ route('rollbar.test') }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">button</button>
                    </form>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Notification</h3>
                </div>
                <div class="panel-body">
                    <form id="notification-test" class="ajax configurable form-horizontal" role="form"  action="{{ route('notification.test') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="demo" value="eleven">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="testo" class="col-md-4 control-label">Demo</label>

                            <div class="col-md-6">
                                <input id="testo" type="text" class="form-control" name="testo" value="" placeholder="inserisci un testo di prova" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Test</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
    $(function() {
        $(document).on('submit', 'form.ajax', function(event) {
            console.log("submit()", event);
            event.preventDefault();
            var form = $(event.target);
            console.log("form", form);
            /* Act on the event */
            $.ajax({
                url: $(this).attr('action'),
                type: 'post',
                data: form.serialize(),
                dataType: "text",
                beforeSend: function( xhr ) {
                    console.log("beforeSend() - xhr", xhr);
                    form[0].reset();
                },
                success: function (data) {
                    console.log("success() - data", data);
                }
            });
        });

        // $("#rollbar-test").on('submit', function(event) {
        //     console.log("submit()", event);
        //     event.preventDefault();
        //     /* Act on the event */
        //     $.ajax({
        //             url: $(this).attr('action'),
        //             type: 'post',
        //             data: {"foo": "bar"},
        //             dataType: "text",
        //             beforeSend: function( xhr ) {
        //                 console.log("beforeSend() - xhr", xhr);
        //             },
        //             success: function (data) {
        //                 console.log("success() - data", data);
        //             }
        //         });
        // });
    });
    </script>
@endpush