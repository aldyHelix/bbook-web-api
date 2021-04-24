@if(count($materi->quizMateri) != 0)
@foreach($materi->quizMateri as $dt)
	 <!-- Konten Lists -->
	 <div class="card">
		  <div class="card-body">
				<p>{{$dt->question}}</p>
				<small>{{$dt->answer}}</small>
				<hr>
				<ul class="list-group">
					 @if(count($dt->hasOption) != 0)
					 @foreach($dt->hasOption as $opt)
						  <li class="list-group-item d-flex justify-content-between align-items-center {{$opt->is_answer ? 'active' : ''}}"><span>{{$opt->option}}. {{$opt->description_option}}</span>
								<span class="badge ">
								<a data-toggle="modal" data-target="#editopt{{$opt->id}}"><i class="feather icon-edit cursor-pointer"></i></a>
								<a data-toggle="modal" data-target="#delopt{{$opt->id}}"><i class="feather icon-trash cursor-pointer"></i></a>
								</span>
						  </li>
						  <!-- edit option -->
						  <div class="modal fade text-left" id="editopt{{$opt->id}}" tabindex="-1" role="dialog"
								aria-labelledby="myModalLabel17" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
									 <div class="modal-content">
									 <div class="modal-header">
										  <h4 class="modal-title" id="myModalLabel17">Edit Pilihan</h4>
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										  </button>
									 </div>
									 <div class="modal-body">
									 {!! Form::open(['url' => 'quiz-option/update/'.$opt->id , 'id' => 'form', 'method'=>'put']) !!}
									 <div class="row">
										  <div class="form-group col-sm-6">
												<label for="option">Pilihan Jawaban.</label>
												<select name="dt[option]" id="option">
													 <option value="A">A</option>
													 <option value="B">B</option>
													 <option value="C">C</option>
													 <option value="D">D</option>
												</select>
										  </div>
										  <div class="form-group col-sm-6">
												<label for="answer">Opsi ini jawaban ?</label>
												<select name="dt[is_answer]" id="answer">
													 <option value="1" {{$opt->is_answer ? 'selected' : ''}}>YA!</option>
													 <option value="0" {{$opt->is_answer ? 'selected' : ''}}>Tidak.</option>
												</select>
										  </div>
									 </div>
										  <div class="form-group">
												<label for="email">Deskripsi Pilihan</label>
												<textarea type="text" class="form-control input-solid" placeholder="Deskripsi full" name="dt[description_option]">{{$opt->description_option}}</textarea>
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
						  <div class="modal fade text-left" id="delopt{{$opt->id}}" tabindex="-1" role="dialog"
								aria-labelledby="myModalLabel17" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
									 <div class="modal-content">
										  <div class="modal-header">
												<h4 class="modal-title" id="myModalLabel17">Hapus Pilihan</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
										  </div>
										  <div class="modal-body">
												<p>Yakin akan menghapus pilihan ini?</p>
												<div class="modal-footer">
													 <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
													 <a class="btn btn-danger" href="{{ url('quiz-option/delete/'.$opt->id) }}">HAPUS</a>
												</div>
										  </div>
									 </div>
								</div>
						  </div>
					 @endforeach
					 @else
					 <li class="list-group-item">No Option Found</li>
					 @endif
				</ul>
		  </div>
		<!-- Modal edit quiz -->
		<div class="modal fade text-left" id="addopt{{$dt->id}}" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel17" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				 <div class="modal-content">
				 <div class="modal-header">
					  <h4 class="modal-title" id="myModalLabel17">Tambah Pilihan</h4>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					  </button>
				 </div>
				 <div class="modal-body">
				 {!! Form::open(['url' => 'quiz-option/insert', 'id' => 'form']) !!}
				 <input type="hidden" value="{{$dt->id}}" name=dt[quiz_id]">
				 <div class="row">
					  <div class="form-group col-sm-6">
							<label for="option">Pilihan Jawaban.</label>
							<select name="dt[option]" id="option">
								 <option value="A">A</option>
								 <option value="B">B</option>
								 <option value="C">C</option>
								 <option value="D">D</option>
							</select>
					  </div>
					  <div class="form-group col-sm-6">
							<label for="answer">Opsi ini jawaban ?</label>
							<select name="dt[is_answer]" id="answer">
								 <option value="1">YA!</option>
								 <option value="0">Tidak.</option>
							</select>
					  </div>
				 </div>
					  <div class="form-group">
							<label for="email">Deskripsi Pilihan</label>
							<textarea type="text" class="form-control input-solid" placeholder="Deskripsi full" name="dt[description_option]"></textarea>
					  </div>
				 </div>
				 <div class="modal-footer">
					  <button type="submit" class="btn btn-primary">Simpan</button>
				 </div>
				 </form>
				 </div>
			</div>
	  </div>
	  <!-- End Edit Quiz -->
	  <!-- End Konten -->
	  <!-- add Quiz option -->
	  <!-- quiz edit -->
	  <div class="modal fade text-left" id="editquiz{{$dt->id}}" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel17" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				 <div class="modal-content">
				 <div class="modal-header">
					  <h4 class="modal-title" id="myModalLabel17">Edit Quiz</h4>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					  </button>
				 </div>
				 <div class="modal-body">
				 {!! Form::open(['url' => 'quiz/update/'.$dt->id , 'id' => 'form', 'method'=>'put']) !!}
				 <input type="hidden" value="{{$dt->id}}" name=dt[materi_id]">
					  <div class="form-group">
							<label for="email">Question</label>
							<textarea type="text" class="form-control input-solid" placeholder="Pertanyaannya . . . " name="dt[question]">{{$dt->question}}</textarea>
					  </div>
					  <div class="form-group">
							<label for="email">Answer</label>
							<textarea type="text" class="form-control input-solid" placeholder="Deskripsi Jawaban. . ." name="dt[answer]">{{$dt->answer}}</textarea>
					  </div>
				 </div>
				 <div class="modal-footer">
				 <button type="submit" class="btn btn-primary">Simpan</button>
				 </div>
				 </form>
				 </div>
			</div>
	  </div>
	  <!-- quiz delete -->
	  <div class="modal fade text-left" id="delquiz{{$dt->id}}" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel17" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				 <div class="modal-content">
					  <div class="modal-header">
							<h4 class="modal-title" id="myModalLabel17">Hapus Quiz</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
					  </div>
					  <div class="modal-body">
							<p>Yakin akan menghapus quiz ini?</p>
							<div class="modal-footer">
								 <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
								 <a class="btn btn-danger" href="{{ url('quiz/delete/'.$dt->id) }}">HAPUS</a>
							</div>
					  </div>
				 </div>
			</div>
	  </div>
	  <!-- end add quiz option -->
 @endforeach
 @else
 <div class="card">
	  <div class="card-header mb-1">
			<h4 class="card-title">No Quiz Record Found</h4>
	  </div>
 </div>
 @endif