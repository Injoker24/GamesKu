@extends('layouts.main')

@section('title', "Add Game")

@section('container')
    @include('partials.navbar')
    <form method="POST" action="/manage-game/addGame" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="gameName" class="form-label">Game Name</label>
          <input type="text" class="form-control @error('gameName') is-invalid
          @enderror" id="gameName" name="gameName">
          @error('gameName')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="gameDeveloper" class="form-label">Game Developer</label>
          <input type="text" class="form-control @error('gameDeveloper') is-invalid
          @enderror" id="gameDeveloper" name="gameDeveloper">
          @error('gameDeveloper')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="inputExample" class="form-label">User ID Example</label>
            <input type="text" class="form-control @error('inputExample') is-invalid
            @enderror" id="inputExample" name="inputExample">
            @error('inputExample')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gameLogo" class="form-label">Upload Game Logo</label>
            <input type="file" class="form-control @error('gameLogo') is-invalid
            @enderror" id="gameLogo" name="gameLogo">
            @error('gameLogo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gameBG" class="form-label">Upload Game Background</label>
            <input class="form-control @error('gameBG') is-invalid
            @enderror" type="file" id="gameBG" name="gameBG">
            @error('gameBG')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="topupType" class="form-label">Topup Type</label>
            <input class="form-control @error('topupType') is-invalid
            @enderror" type="text" id="topupType" name="topupType">
            @error('topupType')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>

        <div class="mb-3">
            <table class="table table-sm table-light me-5 w-100 tableNominal">
                <thead>
                    <tr class="text-center">
                        <th scope="col" style="width:20%">NOMINAL</th>
                        <th scope="col" style="width:20%">PRICE</th>
                        <th scope="col" style="width:20%"></th>
                    </tr>
                </thead>
                <tbody>
                        <tr  class="text-center">
                            <td colspan="3" class="p-5" style="background:none;border:none">EMPTY</td>
                        </tr>
                </tbody>
            </table>
        </div>

        <button type="button" class="btn btn-primary w-25 align-self-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
            +Add Nominal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Nominal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-start">
                    <div class="ms-3">
                        <label for="inputnominal" class="form-label">Input Nominal</label>
                        <input type="text" class="form-control" id="inputnominal" name="inputnominal">
                    </div>

                    <div class="ms-3">
                        <label for="inputprice" class="form-label">Input Price</label>
                        <input type="text" class="form-control" name="inputprice" id="inputprice">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="addNewNominal()">Add</button>
                </div>
            </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Insert</button>
      </form>
@endsection
