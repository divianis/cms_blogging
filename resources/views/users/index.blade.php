@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            @if($users->count()>0)
                <table class=" table">
                    <thead>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ Gravatar::src($user->email) }}" style="border-radius:50%" width="50px"
                                     height="50px" alt="Profile Avatar">
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <div align="center" style="display:flex">


                                    @if(!$user->isAdmin())
                                        <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-gears"></i> Change To Admin</button>
                                        </form>
                                    @elseif($user->isAdmin() && !(($user->id)==1))
                                        <form action="{{ route('users.make-writer', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-dark btn-sm"><i class="fa fa-gears"></i> Change To Writer</button>
                                        </form>
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No users yet.</h3>
            @endif
        </div>

        {{ $users->links() }}

    </div>

@endsection

