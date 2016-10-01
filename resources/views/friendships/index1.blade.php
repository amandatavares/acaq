@extends('layouts.master')

@section('main')

  <h2 class="subheader">Friends</h2>
  <table style="width:100%;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($friends as $friend)
      <tr>
          <td>{{ $friend->getFullName() }}</td>
          <td>{{ $friend->email }}</td>
          <td><a href="{{ url('myfriends/' . $friend->id . '/questions') }}">Veja as publicações</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <h2 class="subheader">Other People</h2>
  <table style="width:100%;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($not_friends as $friend)
      <tr>
          <td>{{ $friend->getFullName() }}</td>
          <td>{{ $friend->email }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <p class="right"><a href="/logout">Logout</a></p>

@stop