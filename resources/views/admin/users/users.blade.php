@extends('layouts.admin')

<x-admin-navbar></x-admin-navbar>
<x-sidebar></x-sidebar>

@section('content')
    <div class="p-2 ml-64 mt-10">
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif
        <div class="flex flex-row items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">Users</h1>
            <a href="{{ route('admin.users.create') }}">
                <button class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">+ Add Users</button>
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr class="border-b border-gray-200">
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Password
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->password }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="font-medium text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline cursor-pointer"
                                        onclick="return confirm('Yakin hapus?')">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
