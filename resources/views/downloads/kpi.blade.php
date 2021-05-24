<!DOCTYPE html>
    <body>
        <table>
            <tr>
                <th colspan="13" style="vertical-align: middle;height :50px;text-align: center;font-size: 22px;"><span style="font-size: 36px">PERFORMANCE APPRAISAL TUNAS GROUP</span></th>
            </tr>
            <tbody>
            <tr>
                <td></td>
                <td style="border:solid thin #000; color: blue">PERIOD</td>
                <td colspan="11">: {{ $year }}</td>
            </tr>
            <tr>
                <td></td>
                <td style="border:solid thin #000">NAME</td>
                <td colspan="11">: {{ $user->getName() }}</td>
            </tr>
            <tr>
                <td></td>
                <td style="border:solid thin #000">JOB TITLE</td>
                <td colspan="11">: {{ $user->getTitle() }}</td>
            </tr>
            <tr>
                <td></td>
                <td style="border:solid thin #000">DIVISION</td>
                <td colspan="11">: {{ $user->division->getName() }}</td>
            </tr>
            <tr>
                <td></td>
                <td>DEPT/DIV</td>
                <td colspan="11">: {{ $user->costcenter->getName() }}</td>
            </tr>
            <tr>
                <td></td>
                <td>SUPERIOR</td>
                <td colspan="11">: @if($user->getSuperordinate() != null) {{ $user->getSuperordinate()->getName()}} @else - @endif</td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td colspan="3" style="text-align: center">Performance Grade</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td>Point</td>
                <td>Grade</td>
                <td>Remark</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td>4.26 - 5.00</td>
                <td>A</td>
                <td>Exceed Expectation</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td>3.26 - 4.25</td>
                <td>B</td>
                <td>Meet Expectation</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td>2.51 - 3.25</td>
                <td>C</td>
                <td>Below Expectation</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td>2.51</td>
                <td>D</td>
                <td>Unacceptable</td>
                <td></td>
            </tr>
            
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td rowspan="2" style="text-align: center" width="24"><b>OBJECTIVE</b></td>
                <td rowspan="2" style="text-align: center" width="50"><b>KEY PERFORMANCE INDICATOR</b></td>
                <td rowspan="2" style="text-align: center" width="50"><b>TARGET</b></td>
                <td rowspan="2" style="text-align: center" width="10"><b>W(100%)</b></td>
                <td colspan="5" style="text-align: center" width="20"><b>ACHIEVEMENT INDICATOR</b></td>
                <td rowspan="2" style="text-align: center" width="14"><b>ACHIEVEMENT</b></td>
                <td rowspan="2" style="text-align: center" width="10"><b>SCORE</b></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center"><b>1</b></td>
                <td style="text-align: center"><b>2</b></td>
                <td style="text-align: center"><b>3</b></td>
                <td style="text-align: center"><b>4</b></td>
                <td style="text-align: center"><b>5</b></td>
            </tr>
            <?php
                $totalWeight = 0;
                $totalAchievement = 0;
                $totalScore = 0;
            ?>
            @foreach($kpis as $kpi)
            @php 
                $indicator = $kpi->getIndicators(); 
                // $totalWeight = $totalWeight + $kpi->getWeight();
                // $totalScore = $totalScore + $kpi->actual;
                $weight = floatval($kpi->getWeight());
                $achievement = floatval($kpi->getAchievement());
                $score = $achievement * ($weight/100);

                $totalWeight += floatval($kpi->getWeight());
                $totalAchievement += intval($kpi->getAchievement());
                $totalScore += $score;
            @endphp
            <tr>
                <td></td>
                <td style="text-align: center">{{ $kpi->kpiTemplate->bsc->getName() }}</td>
                <td style="text-align: center">{{ $kpi->kpiTemplate->kpi->getName() }}</td>
                <td style="text-align: center">{{ $kpi->getTarget() }}</td>
                <td style="text-align: center">{{ $kpi->getWeight() }}%</td>
                <td style="text-align: center">{{ $indicator->indicator1 }}</td>
                <td style="text-align: center">{{ $indicator->indicator2 }}</td>
                <td style="text-align: center">{{ $indicator->indicator3 }}</td>
                <td style="text-align: center">{{ $indicator->indicator4 }}</td>
                <td style="text-align: center">{{ $indicator->indicator5 }}</td>
                <td style="text-align: center">{{ $kpi->actual }}</td>
                <td style="text-align: center">{{ $score }}</td>
                <td></td>
            </tr>

            @endforeach
            <tr>
                <td colspan="4"></td>
                <td style="text-align: center"><b>{{ $totalWeight }}%</b></td>
                <td colspan="6" style="text-align: center"><b>Total Score</b></td>
                <td style="text-align: center"><b>{{ $totalScore }}</b></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="13" style="height: 50px"></td>
            </tr>
            <tr>
                <td colspan="11" rowspan="5"></td>
                <td colspan="2" style="text-align: left">Date:</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">APPROVED BY</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="height: 50px"></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align: center">{{ $user->getName() }}</td>
                <td style="text-align: center">@if($user->getSuperordinate() != null) {{ $user->getSuperordinate()->getName()}} @else - @endif</td>
            </tr>
            </tbody>
        </table>
    </body>
</html>