<!--FOOTER-->
<div class="container-fluid footer">


    <div class="row">
        <div class="col-sm-4">
            <h1>
                Bryant Public Schools
            </h1>
            <hr>
            <h3>Information Management System</h3>

            <ul class="nav-title">
                <li class="nav-item padding-top-xl">
                    <a href="/">
                        <img class="logo" src="{{ asset('themes/' . $activeTheme . '/assets/img/logo.png') }}"></img>
                    </a>
                </li>
            </ul>


        </div>
        <div class="col-sm-4">

            {{--{!!
                Widget::TopNews()
            !!}--}}

        </div>
        <div class="col-sm-4">


            @if (Auth::user() && Auth::user()->can('manage_admin'))

                <h1>
                    {{ trans('kotoba::general.information') }}
                </h1>
                <hr>

                <div class="row">
                    </h3>
                    <a class="footer_links" href="/admin">
                        {{ trans('kotoba::general.administration') }}
                    </a>
                    </h3>
                </div><!--./row-->
                <div class="row">
                    {{-- $menu_navLinks->asUl() --}}
                    <ul class="footer_links">
                        {{--@include('partials.footer_menu', ['items'=> $menu_navLinks->roots()])--}}
                    </ul>
                </div><!--./row-->


            @else

                <h1>
                    {{ trans('kotoba::button.log_in') }}
                </h1>
                <hr>

                <form class="form-horizontal margin-top-xl" role="form" method="POST" action="/auth/login">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-md-3 control-label">{{ trans('kotoba::account.email') }}</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   tabindex="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{{ trans('kotoba::auth.password') }}</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password" tabindex="2">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> {{ trans('kotoba::auth.remember_me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-success btn-block" tabindex="0">
                                {{ trans('kotoba::button.log_in') }}
                            </button>
                        </div>
                    </div>

                </form>

            @endif


            <div class="row">
                {!! Form::open([
                    'url' => 'search/results',
                    'method' => 'POST',
                    'class' => 'form-horizontal'
                ]) !!}

                <div class="form-group">
                    <label class="col-md-3 control-label">{{ Lang::choice('kotoba::general.search', 1) }}</label>
                    <div class="col-md-9">
                        <input type="text" id="search_terms" name="search_terms"
                               placeholder="{{ trans('kotoba::general.command.enter') }} {{ Lang::choice('kotoba::general.search', 1) }}"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-9">
                        <button type="submit" class="btn btn-success btn-block" tabindex="0">
                            {{ trans('kotoba::button.search') }}
                        </button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div> <!-- ./ row -->


        </div>
    </div><!--./row-->
    <div class="row">


        <div class="padding-lg">
            <div class="copyright text-center">
                @if (Auth::user() && Auth::user()->can('manage_admin'))
                    <a href="/admin">
                        {{ trans('kotoba::general.administration') }}
                    </a>
                    &nbsp;&copy;&nbsp;2015-2016
                @else
                    <a href="/">
                        {{ Setting::get('description', Config::get('core.brand_title')) }}
                    </a>
                    &nbsp;&copy;&nbsp;2015-2016
                @endif
            </div>
        </div>


    </div><!--./row-->


</div><!--./container-fluid-->
