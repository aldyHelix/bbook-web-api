@if(count($materi->kontenMateri) != 0)
        @foreach($materi->kontenMateri as $dt)
            <!-- Konten Lists -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 mr-1">
                            <img height="100" width="auto" src="{{$dt->gambar_konten != null ? $dt->getPhoto() : defaultPhoto()}}">
                        </div>
                        <div class="col-sm-7">
                            {{$dt->description}}
                        </div>
                        <div class="col-sm-1">
                            <a data-toggle="modal" data-target="#editkonten{{$dt->id}}"><i class="feather icon-edit cursor-pointer" href="#"></i></a>
                            <hr>
                            <a class="danger" data-toggle="modal" data-target="#deletekonten{{$dt->id}}"><i class="feather icon-trash cursor-pointer"></i></a>
                       </div>
                        <div class="modal fade text-left" id="editkonten{{$dt->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel17" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel17">Tambah Konten</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['url' => 'konten/update/'.$dt->id , 'method' => 'PUT', 'id' => 'form', 'enctype'=>'multipart/form-data']) !!}
                                        <input type="hidden" value="{{$materi->id}}" name="dt[materi_id]">
                                        <div class="form-group text-center">
                                            <img height="100" width="auto" src="{{$dt->gambar_konten != null ? $dt->getPhoto() : defaultPhoto()}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="basicInputFile">Gambar Konten</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="gambar_konten">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Deskripsi</label>
                                            <textarea type="text" class="form-control input-solid" placeholder="Deskripsi" name="desc" value="{{$dt->description}}">{{$dt->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- delete option -->
                        <div class="modal fade text-left" id="deletekonten{{$dt->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel17" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel17">Hapus Konten</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Yakin akan menghapus pilihan ini?</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                            <a class="btn btn-danger" href="{{ url('konten/delete/'.$dt->id) }}">HAPUS</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Konten -->
        @endforeach
        @else
        <div class="card">
            <div class="card-header mb-1">
                <h4 class="card-title">No Konten Record Found</h4>
            </div>
        </div>
        @endif