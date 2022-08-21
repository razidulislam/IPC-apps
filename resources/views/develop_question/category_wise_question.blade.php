<div id="result">
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th scope="col">Question Name</th>
                <th scope="col">Option</th>
                <th scope="col">Score</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $totalQuestion = count($allQuestion);
            @endphp
           
            @foreach($allQuestion as $key => $qustionInfo)
                @if(!empty($allQuestion[$key]['qeustion_data']))
                    @php 
                        $totalOption = count($allQuestion[$key]['qeustion_data']);
                        $optionData  = $allQuestion[$key]['qeustion_data'];
                    @endphp
                    <tr>
                        <td  rowspan="{{  $totalOption }}"> {{ $allQuestion[$key]['qeustion_name'] }}  </td>
                        @foreach($optionData as $key => $qustionInfo)
                            @if(!empty($optionData[$key]['option']) && $key == 0)
                            
                            <td> <input type="checkbox" name="name1"/> {{ $optionData[$key]['option'] }}  </td>
                            <td>  {{  $optionData[$key]['score'] }}  </td>
                            @endif
                        @endforeach
                    </tr>
                @endif

                @foreach($optionData as $key => $qustionInfo)
                    @if(!empty($optionData[$key]['option']) && $key > 0)
                    <tr>
                        <td> <input type="checkbox" name="name1[]" value="{{  $optionData[$key]['score'] }}" /> {{ $optionData[$key]['option'] }}  </td>
                        <td>  <input type="hidden" name="score_array[]" value="{{  $optionData[$key]['score'] }}" /> {{  $optionData[$key]['score'] }}  </td>
                    </tr>
                    @endif
                @endforeach
                
            @endforeach
          <!-- 
          <tr>
            <td><input type="checkbox" name="name1"/> Yes</td>
            <td>5</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="name1"/> No</td>
            <td>0</td>
          </tr>
          <tr>
            <td rowspan="2">2. Have you complete IPC training? <br> Choose one answer</td>
            <td><input type="checkbox" name="name1"/> Yes, completed</td>
            <td>10</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="name1"/> No</td>
            <td>0</td>
          </tr>
          <tr>
            <td rowspan="2">3. Does the IPC team include both doctors and nurses?</td>
            <td><input type="checkbox" name="name1"/> Yes, without clearly defined objectives</td>
            <td>10</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="name1"/> No</td>
            <td>0</td>
          </tr> -->
        </tbody>

    </table>

</div>

