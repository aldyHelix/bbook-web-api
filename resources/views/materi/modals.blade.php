<div class="modal fade text-left" id="addkonten" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel17">Tambah Konten</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['url' => 'konten/insert', 'id' => 'form', 'enctype'=>'multipart/form-data']) !!}
				<input type="hidden" value="{{$materi->id}}" name="dt[materi_id]">
				<div class="form-group">
					<label for="basicInputFile">Gambar Konten</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="inputGroupFile01" name="gambar_konten">
						<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
					</div>
				</div>
				<div class="form-group">
					<label for="email">Deskripsi</label>
					<textarea type="text" class="form-control input-solid" placeholder="Deskripsi" name="desc"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade text-left" id="addquiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel17">Tambah Quiz</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['url' => 'quiz/insert', 'id' => 'form']) !!}
				<input type="hidden" value="{{$materi->id}}" name=dt[materi_id]">
				<div class="form-group">
					<label for="email">Question</label>
					<textarea type="text" class="form-control input-solid" placeholder="Pertanyaannya . . . "
						name="dt[question]"></textarea>
				</div>
				<div class="form-group">
					<label for="email">Answer</label>
					<textarea type="text" class="form-control input-solid" placeholder="Deskripsi Jawaban. . ."
						name="dt[answer]"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>