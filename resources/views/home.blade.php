@extends('layouts.app')

@section('content')
    <style>
        .social-link {
            font-size: 15px;
        }

        .add-new-notification {
            padding: 18px 0px 7px 0px;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .card {
            border: 0px !important
        }

        .logs-row {
            height: 141px;
            overflow: scroll;
        }

    </style>
    <script>

    </script>
    <div class="container">

        <div class="row">
            <div class="col text-center">
                <div>
                    <h1>Gram</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <div class="social-link">
                    Social Link : {{ $data->social_profile }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <div class="add-new-notification">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#notificationModal">
                        Add New Notification
                    </button>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col text-center">
                <div class="add-new-notification">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#snoozeModal">
                        Snooze
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <div class="add-new-notification">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#managePeopleModal">
                        Manage People
                    </button>
                </div>
            </div>
        </div>

        <div class="row logs-row">
            <div class="col text-center">
                <div class="card">
                    <article>
                        <h2>Logs</h2>
                        @foreach ($logs as $log)
                            <p>{{ $log->logs }}</p>
                        @endforeach
                    </article>
                </div>
            </div>
        </div>



        <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog"
            aria-labelledby="notificationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Notification</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">Add New Notification</div>
                            <div class="card-body">

                                <form action="{{ route('saveSocialUsers') }}" method="post" id="newUser">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email_1">Email address</label>
                                        <input type="email" class="form-control" id="email_1" name="email_1"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_1">Phone</label>
                                        <input type="text" class="form-control" id="phone_1" name="phone_1"
                                            placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="provider_1">Provider</label>
                                        <select name="provider_1" id="provider_1">
                                            <option value="1">Verizon</option>
                                            <option value="2">AT&T</option>
                                            <option value="3">T-Mobile</option>
                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <input type="radio" id="genrated_email" name="genrated_email" value="1">
                                        <label for="genrated_email">Display Genrated Email</label><br>
                                        <span>OR</span><br>
                                        <label for="custom_email">Our Custom Email</label>
                                        <input type="text" class="form-control" id="custom_email" name="custom_email"
                                            placeholder="Custom Email">
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_active_1" name="is_active_1">
                                        <label class="form-check-label" for="is_active">Is Active</label>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="submitNewUser()">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="snoozeModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Snooze</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">Snooze</div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="managePeopleModal" tabindex="-1" role="dialog"
            aria-labelledby="managePeopleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Manage People</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="customers">
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Is Active</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($data->getSocialUser as $socialUser)
                                <tr>
                                    <td>{{ $socialUser->id }}</td>
                                    <td>{{ $socialUser->email }}</td>
                                    <td>{{ $socialUser->phone }}</td>
                                    <td>{{ $socialUser->is_active == 1 ? 'Active' : 'Snoozed' }}</td>
                                    <td>
                                        <a href="{{ route('editUser', ['id' => $socialUser->id]) }}">Edit</a>
                                        <a href="javascript:void(0)"
                                            onclick="deleteUser({{ $socialUser->id }})">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {

            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }

        $(document).ready(function() {
            $('.add_users').on('click', function() {
                var divCount = $('#divCount').val();
                var divIncrement = parseInt(divCount) + 1;
                var original = document.getElementById('add_user_1');
                var clone = original.cloneNode(true);
                clone.id = "add_user_" + divIncrement;
                original.parentNode.appendChild(clone);
                $('#divCount').val(divIncrement);
            })
        })

        function submitNewUser() {
            $('#newUser').submit();
        }

        function deleteUser(id) {
            var result = confirm("Are you sure you want to delete this user?");
            if (result) {
                $.ajax({
                    type: 'GET',
                    url: `/deleteUser/${id}`,
                    data: '_token = <?php echo csrf_token(); ?>',
                    success: function(data) {
                        location.reload();
                    }
                });
            }
            debugger;
        }
    </script>
@endsection
