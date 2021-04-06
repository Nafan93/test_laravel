@extends('layouts.app')

@section('title', ' - Home Page')
@section('content')
<div class="uk-container">
    @if(session()->get('success'))
        <div class="uk-alert-success uk-width-1-1" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            {{ session()->get('success') }}  
        </div>
    @endif
    <table class="uk-table">
        <caption>Table Caption</caption>
        <thead>
            <tr>
                @role('admin', 'manager')
                    <th>Action</th>
                @endrole
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Position</th>
                <th>Role</th>
                <th>Permissions</th>
            </tr>
        </thead>
       
        <tbody >
            @forelse ($users as $user)
                <tr>
                    @role('admin', 'manager')
                        <td class="uk-flex">
                            <a href="{{ route('users.edit', $user->id) }}" >
                                <span uk-icon="pencil"></span>
                            </a>
                            @role('admin')
                                <span>|</span>
                                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="uk-button uk-button-link uk-text-danger" uk-icon="close" type="submit" title="Remove">
                                    </button>
                                </form>
                            @endrole
                        </td>
                    @endrole
                    
                    <td class="uk-width-small">
                        @if(isset($user->image))
                            <img src="{{ $user->image }}" alt="">
                        @else
                            <span>No image</span>
                        @endif
                    </td>
                    <td><span>{{ $user->name }}</span></td>
                    <td><span>{{ $user->email }}</span></td>
                    <td>
                        @forelse ($user->departments as $department)
                            <span>
                                {{ $department->title }}
                            </span>
                        @empty
                            <span>Empty</span>
                        @endforelse
                    </td>
                    <td><span>{{ $user->position->title }}</span></td>
                    <td>
                        @forelse ($user->roles as $role)
                            <span>{{ $role->name }}</span>
                        @empty
                            <span>Empty</span>
                        @endforelse
                    </td>
                    <td>
                        @forelse ($user->roles as $role)
                            @forelse ($role->permissions as $permission)
                                <span>{{ $permission->name }}</span>
                            @empty
                                
                            @endforelse
                        @empty
                            <span>Empty</span>
                        @endforelse
                    </td>
                </tr>
            @empty
                
            @endforelse
           
        </tbody>
    </table>
    
</div>
@endsection
