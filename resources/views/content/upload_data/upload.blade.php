@extends('layouts.template')
@section('title', 'Upload Data')
@section('title3', 'Upload')
@section('content')


    <div class="flex items-center justify-center w-full mb-3" id="holder">
        <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <i class="fa fa-cloud-upload mb-3 fa-5x" aria-hidden="true"></i>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                        upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Format excel .xlsx atau .xls</p>
            </div>
            <input id="dropzone-file" type="file" name="file" class="hidden"/>
        </label>
    </div>
    <div class="flex">
        <div class="flex p-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium" id="title_file">Nama file yang diupload</span>
            </div>
        </div>
        <button type="button" id="button"
            onclick="event.preventDefault(); document.getElementById('data-form').submit();"
            class="ml-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 p-4">
            <i class="fa fa-cloud-upload mr-2" aria-hidden="true"></i>Upload Data
        </button>
        <form method="post" enctype="multipart/form-data" action="/Import-Data-Raw" id="data-form">
            @csrf
            <input type="hidden" name="path" id="path">
        </form>
    </div>

    <script type="text/javascript">
        document.querySelector("#dropzone-file").onchange = function() {
            document.querySelector("#title_file").textContent = this.files[0].name;
        }

        function uploadFile() {
            var fd = new FormData();
            var files = $('#dropzone-file')[0].files[0];
            fd.append('file', files);
            $.ajax({
                url: 'Import-File-Raw',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#path').val(response.path);
                    document.querySelector("#title_file").textContent = files.name;
                },
            });
        }

        var holder = document.getElementById('holder');
        holder.ondragenter = function(e) {
            return false;
        };
        holder.ondragleave = function() {
            return false;
        };
        holder.ondrop = function(e) {
            e.preventDefault();
            document.querySelector('#dropzone-file').files = e.dataTransfer.files;
            uploadFile();
        };
        holder.ondragover = function(e) {
            e.preventDefault()
        }
        holder.onchange = function(e) {
            document.querySelector('#dropzone-file').files = e.target.files;
            uploadFile();
        }
    </script>

@endsection
