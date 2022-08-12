<x-app-layout>
    @section('title', 'Home')
    <x-slot name="dropdown">
        fffn
    </x-slot>
<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-4 display-none">
            <div class="card" style="min-height: 100%">
                {{--  mobile nav  --}}
                <div class="card-header"><b>Menu</b></div>

                <div class="card-body p-0">
                    <ul class="list-group">
                        <a class="list-group-item list-group-item-action bg-dark text-white" href="#">Dashboard</a>
                        <a class="list-group-item list-group-item-action" href="#">New </a>
                        <a class="list-group-item list-group-item-action" href="#">All </a>
                        <a class="list-group-item list-group-item-action" href="#">Action 1</a>
                        <a class="list-group-item list-group-item-action" href="#">Action 2</a>
                        <a class="list-group-item list-group-item-action" href="#">My Profile</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Farmer Dashboard</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="row mt-3">
                        <div class="col-4">
                            <a href="#" class="custom-link">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img class="img-custom" src="{{ asset('images/plant1.jpg') }}" alt="">
                                        <h2 class="text-center">5</h2>
                                        <h6>Total One</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="custom-link">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img class="img-custom" src="{{ asset('images/plant2.jpg') }}" alt="">
                                        <h2 class="text-center">3</h2>
                                        <h6>Total 2</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="custom-link">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img class="img-custom" src="{{ asset('images/plant3.jpg') }}" alt="">
                                        <h2 class="text-center">13</h2>
                                        <h6>Total Three</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Lorem Summary</h6>
                            <table class="table table-hover table-light">
                                <tr>
                                    <td>#</td>
                                    <td>Lorem Ipsum</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>#</td>
                                    <td>Lorem Ipsum</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>#</td>
                                    <td>Lorem Ipsum</td>
                                    <td>6</td>
                                </tr>
                                <tr>
                                    <td>#</td>
                                    <td>Lorem Ipsum</td>
                                    <td>9</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Other details</h6>
                            <table class="table table-hover table-secondary">
                                        <tr>
                                            <td>lorem ipsum</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>lorem ipsum</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>lorem ipsum</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>lorem ipsum</td>
                                            <td>0</td>
                                        </tr>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
