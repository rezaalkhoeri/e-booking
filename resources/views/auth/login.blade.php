@extends('layouts.default')
@section('content')

<div class="col-md-12">
    <div class="wrapper">
        <div class="row no-gutters">
            <div class="col-lg-12 col-md-12 d-flex">
                <div class="contact-wrap w-100 p-md-5 p-4">
                    <h3 class="mb-4" align="center">Login</h3>
                    <div id="form-message-warning" align="center" class="mb-4"></div>
                    <div id="form-message-success" align="center" class="mb-4">
                        E-Service Pertamina Drilling Services Indonesia
                    </div>
                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label" for="name">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label" for="name">Password</label>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')

@endsection
@endsection