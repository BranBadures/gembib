@extends('laravel-usp-theme::master')

@section('content')

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Título</th>
          <th scope="col">Autor</th>
          <th scope="col">Editora</th>
          <th scope="col">Status</th>
          <th scope="col">Processar</th>
        </tr>
      </thead>
      <tbody>
        @foreach($suggestions as $suggestion)
        <tr>
          <th>{{ $suggestion->titulo }}</th>
          <td>{{ $suggestion->autor }}</td>
          <td>{{ $suggestion->editora }}</td>
          <td>{{ $suggestion->status }}</td>
          <td><a href="#">processar</a></td>
        </tr>
        @endforeach

      </tbody>
    </table>

@endsection