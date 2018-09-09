@extends('layouts/main')
@section('content')
<div class="row justify-content-center">
    <div id="chat-container" class="col-12 col-md-10 col-lg-8 mt-5 p-4 re">
        <div class="row justify-content-center">
            <div class="col-11 item-post mb-4 re">
                <form id="form-create-post" @submit="createPost" action="" method="post">
                    <div class="row p-2 shadows-2 align-items-center">
                        <div class="col-2">
                            <img v-bind:src="userLogin.image" alt="profile-image-1" class="img-fluid profile-image">
                        </div>
                        <div class="col-10">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" placeholder="¿Que quieres decirle al mundo?" v-model="formPost.content" maxlength="140">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary re-r" type="submit" title="Send"><i class="material-icons">send</i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-10 offset-2">
                            <p v-for="error of errors" class="text-danger">@{{error.message}}</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="content-items col-12 row justify-content-center">
                <div class="col-12 item-post" v-for="post of posts">
                    <div class="row p-2">
                        <div class="col-1 text-center">
                            <img v-bind:src="post.user.image" alt="profile-image" class="img-fluid profile-image-item mb-2">
                        </div>
                        <div class="col-11">
                            <div class="row">
                                <div class="col-10 mb-1">
                                    <span class="item-post-name re">@{{post.user.username}}</span>
                                </div>
                                <div class="col-12">
                                    <p class="re p-2">@{{post.content}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush