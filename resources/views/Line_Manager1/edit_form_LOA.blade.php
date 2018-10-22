<div class="row">
  <div class="col-md-8">
  
    @if ( Auth::user()->grade > 6 && Auth::user()->group != 'Group HR Business Partner' )
      <div class="form-group">
        <label for="user_hrbp" class="col-md-5 control-label">HR Business Partner<span style="color: red;"> *</span></label>
        <div class="col-md-6" style="padding-bottom: 10px;">
            <select class="form-control select2-hrbp" id="user_hrbp" name="user_hrbp" required title="Select HR Business Partner" style="width: 100%">
              <option></option>
              @foreach ($hrbp as $hrbp)
                <option value="{{ $hrbp->id }}" {{ $hrbp->id == $data->user_hrbp ? 'selected' : '' }}>{{ $hrbp->name }}</option>
              @endforeach
            </select>
        </div>
      </div>
    @else
    @endif

      @if ( Auth::user()->grade == 7 )
        <div class="form-group">
          <label for="user_GH" class="col-md-5 control-label">Line Manager<span style="color: red;"> *</span></label>
          <div class="col-md-6" style="padding-bottom: 10px;">
              <select class="form-control select2-GH" id="user_GH" name="user_GH" required title="Select Line Manager 1" style="width: 100%;">
                <option></option>
                @foreach ($group_head as $group_head)
                  <option value="{{ $group_head->id }}" {{ $group_head->id == $data->user_GH ? 'selected' : '' }}>{{ $group_head->name }}</option>
                @endforeach
              </select>
          </div>
        </div>

        <div class="form-group">
          <label for="user_chief" class="col-md-5 control-label"></label>
          <div class="col-md-6" style="padding-bottom: 10px;">
              <select class="form-control select2-chief" id="user_chief" name="user_chief" required title="Select Line Manager 2" style="width: 100%;">
                <option></option>
                @foreach ($gh_HR as $gh_HR)
                  <option value="{{ $gh_HR->id }}" {{ $gh_HR->id == $data->user_chief ? 'selected' : '' }}>{{ $gh_HR->name }}</option>
                @endforeach
              </select>
          </div>
        </div>
      @elseif( Auth::user()->grade == 8 )
        <div class="form-group">
          <label for="user_chief" class="col-md-5 control-label">Line Manager<span style="color: red;"> *</span></label>
          <div class="col-md-6" style="padding-bottom: 10px;">
              <select class="form-control select2-chief" id="user_chief" name="user_chief" required title="Select Line Manager" style="width: 100%">
                <option></option>
                @foreach ($chief as $chief)
                  <option value="{{ $chief->id }}" {{ $chief->id == $data->user_chief ? 'selected' : '' }}>{{ $chief->name }}</option>
                @endforeach
              </select>
          </div>
        </div>

        <div class="form-group">
          <label for="user_chro" class="col-md-5 control-label">{{-- Chief Of Human Resource<span style="color: red;"> *</span> --}}</label>
          <div class="col-md-6" style="padding-bottom: 10px;">
              <select class="form-control select2-chro" id="user_chro" name="user_chro" required title="Chief Of Human Resource" style="width: 100%">
              <option></option>
                @foreach ($chro as $chro)
                  <option value="{{ $chro->id }}" {{ $chro->id == $data->user_chro ? 'selected' : '' }}>{{ $chro->name }}</option>
                @endforeach
              </select>
          </div>
        </div>
      @endif
     
  </div>

  <div class="col-md-4">
    <div class="col-md-12">
      <label><span class="glyph-icon icon-exclamation-circle"></span> Verified By</label>
      <p>In this section you will choose an approval request that will be approved by the person who has the right to approve your request.
    </div>
  </div>
</div> 