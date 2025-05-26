<div class="appoints">
    <h4>المواعيد المتاحة في الصباح</h4>
    <div class="appoints">
        <div class="pm-times times-spans flex-center">
            @foreach ($appointments->where('timing','am') as $row)
                <div class="time-option">
                        <input type="radio" name="time_from" id="time{{$row->id}}" value="{{$row->time_from}}">
                        <label for="time{{$row->id}}">{{ \Carbon\Carbon::createFromFormat('H:i:s', $row->time_from)->format('h:i A') }}</label>
                </div>
            @endforeach
        </div>
      </div>
    </div>
</div>						

<div class="appoints">
    <h4>المواعيد المتاحة في المساء</h4>
    <div class="pm-times times-spans flex-center">
        @foreach ($appointments->where('timing','pm') as $row)
            <div class="time-option">
                    <input type="radio" name="time_from" id="time{{$row->id}}" value="{{$row->time_from}}">
                    <label for="time{{$row->id}}">{{ \Carbon\Carbon::createFromFormat('H:i:s', $row->time_from)->format('h:i A') }}</label>
            </div>
        @endforeach
    </div>
</div>