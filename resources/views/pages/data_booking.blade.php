@extends('layouts.default')
@section('content')

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex services align-self-stretch px-8 ftco-animate fadeInUp ftco-animated">
                <div class="d-block services-wrap text-center">
                    <div class="media-body py-4 px-3">
                        <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-standard">
                            <div class="fc-header-toolbar fc-toolbar ">
                                <div class="fc-toolbar-chunk">
                                    <h2 class="fc-toolbar-title" id="fc-dom-1">April 2022</h2>
                                </div>
                                <div class="fc-toolbar-chunk"></div>
                                <div class="fc-toolbar-chunk"><button type="button" title="This month" aria-pressed="false" class="fc-today-button fc-button fc-button-primary">today</button>
                                    <div class="fc-button-group"><button type="button" title="Previous month" aria-pressed="false" class="fc-prev-button fc-button fc-button-primary"><span class="fc-icon fc-icon-chevron-left"></span></button><button type="button" title="Next month" aria-pressed="false" class="fc-next-button fc-button fc-button-primary"><span class="fc-icon fc-icon-chevron-right"></span></button></div>
                                </div>
                            </div>
                            <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active" style="height: 800.741px;">
                                <div class="fc-daygrid fc-dayGridMonth-view fc-view">
                                    <table role="grid" class="fc-scrollgrid  fc-scrollgrid-liquid">
                                        <thead role="rowgroup">
                                            <tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                                                <th role="presentation">
                                                    <div class="fc-scroller-harness">
                                                        <div class="fc-scroller" style="overflow: hidden;">
                                                            <table role="presentation" class="fc-col-header " style="width: 1078px;">
                                                                <colgroup></colgroup>
                                                                <thead role="presentation">
                                                                    <tr role="row">
                                                                        <th role="columnheader" class="fc-col-header-cell fc-day fc-day-sun">
                                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="Sunday" class="fc-col-header-cell-cushion ">Sun</a></div>
                                                                        </th>
                                                                        <th role="columnheader" class="fc-col-header-cell fc-day fc-day-mon">
                                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="Monday" class="fc-col-header-cell-cushion ">Mon</a></div>
                                                                        </th>
                                                                        <th role="columnheader" class="fc-col-header-cell fc-day fc-day-tue">
                                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="Tuesday" class="fc-col-header-cell-cushion ">Tue</a></div>
                                                                        </th>
                                                                        <th role="columnheader" class="fc-col-header-cell fc-day fc-day-wed">
                                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="Wednesday" class="fc-col-header-cell-cushion ">Wed</a></div>
                                                                        </th>
                                                                        <th role="columnheader" class="fc-col-header-cell fc-day fc-day-thu">
                                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="Thursday" class="fc-col-header-cell-cushion ">Thu</a></div>
                                                                        </th>
                                                                        <th role="columnheader" class="fc-col-header-cell fc-day fc-day-fri">
                                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="Friday" class="fc-col-header-cell-cushion ">Fri</a></div>
                                                                        </th>
                                                                        <th role="columnheader" class="fc-col-header-cell fc-day fc-day-sat">
                                                                            <div class="fc-scrollgrid-sync-inner"><a aria-label="Saturday" class="fc-col-header-cell-cushion ">Sat</a></div>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody role="rowgroup">
                                            <tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
                                                <td role="presentation">
                                                    <div class="fc-scroller-harness fc-scroller-harness-liquid">
                                                        <div class="fc-scroller fc-scroller-liquid-absolute" style="overflow: hidden auto;">
                                                            <div class="fc-daygrid-body fc-daygrid-body-unbalanced " style="width: 1078px;">
                                                                <table role="presentation" class="fc-scrollgrid-sync-table" style="width: 1078px; height: 776px;">
                                                                    <colgroup></colgroup>
                                                                    <tbody role="presentation">
                                                                        <tr role="row">
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past fc-day-other" data-date="2022-03-27" aria-labelledby="fc-dom-2">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-2" class="fc-daygrid-day-number" aria-label="March 27, 2022">27</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past fc-day-other" data-date="2022-03-28" aria-labelledby="fc-dom-4">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-4" class="fc-daygrid-day-number" aria-label="March 28, 2022">28</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past fc-day-other" data-date="2022-03-29" aria-labelledby="fc-dom-6">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-6" class="fc-daygrid-day-number" aria-label="March 29, 2022">29</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past fc-day-other" data-date="2022-03-30" aria-labelledby="fc-dom-8">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-8" class="fc-daygrid-day-number" aria-label="March 30, 2022">30</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past fc-day-other" data-date="2022-03-31" aria-labelledby="fc-dom-10">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-10" class="fc-daygrid-day-number" aria-label="March 31, 2022">31</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2022-04-01" aria-labelledby="fc-dom-12">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-12" class="fc-daygrid-day-number" aria-label="April 1, 2022">1</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2022-04-02" aria-labelledby="fc-dom-14">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-14" class="fc-daygrid-day-number" aria-label="April 2, 2022">2</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past" tabindex="0">
                                                                                                <div class="fc-event-main">
                                                                                                    <div class="fc-event-main-frame">
                                                                                                        <div class="fc-event-title-container">
                                                                                                            <div class="fc-event-title fc-sticky">simple event</div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a></div>
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr role="row">
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2022-04-03" aria-labelledby="fc-dom-16">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-16" class="fc-daygrid-day-number" aria-label="April 3, 2022">3</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past" href="https://www.google.com/">
                                                                                                <div class="fc-event-main">
                                                                                                    <div class="fc-event-main-frame">
                                                                                                        <div class="fc-event-title-container">
                                                                                                            <div class="fc-event-title fc-sticky">event with URL</div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a></div>
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2022-04-04" aria-labelledby="fc-dom-18">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-18" class="fc-daygrid-day-number" aria-label="April 4, 2022">4</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2022-04-05" aria-labelledby="fc-dom-20">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-20" class="fc-daygrid-day-number" aria-label="April 5, 2022">5</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2022-04-06" aria-labelledby="fc-dom-22">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-22" class="fc-daygrid-day-number" aria-label="April 6, 2022">6</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2022-04-07" aria-labelledby="fc-dom-24">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-24" class="fc-daygrid-day-number" aria-label="April 7, 2022">7</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2022-04-08" aria-labelledby="fc-dom-26">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-26" class="fc-daygrid-day-number" aria-label="April 8, 2022">8</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2022-04-09" aria-labelledby="fc-dom-28">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-28" class="fc-daygrid-day-number" aria-label="April 9, 2022">9</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr role="row">
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2022-04-10" aria-labelledby="fc-dom-30">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-30" class="fc-daygrid-day-number" aria-label="April 10, 2022">10</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2022-04-11" aria-labelledby="fc-dom-32">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-32" class="fc-daygrid-day-number" aria-label="April 11, 2022">11</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2022-04-12" aria-labelledby="fc-dom-34">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-34" class="fc-daygrid-day-number" aria-label="April 12, 2022">12</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2022-04-13" aria-labelledby="fc-dom-36">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-36" class="fc-daygrid-day-number" aria-label="April 13, 2022">13</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2022-04-14" aria-labelledby="fc-dom-38">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-38" class="fc-daygrid-day-number" aria-label="April 14, 2022">14</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2022-04-15" aria-labelledby="fc-dom-40">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-40" class="fc-daygrid-day-number" aria-label="April 15, 2022">15</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2022-04-16" aria-labelledby="fc-dom-42">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-42" class="fc-daygrid-day-number" aria-label="April 16, 2022">16</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr role="row">
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2022-04-17" aria-labelledby="fc-dom-44">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-44" class="fc-daygrid-day-number" aria-label="April 17, 2022">17</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2022-04-18" aria-labelledby="fc-dom-46">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-46" class="fc-daygrid-day-number" aria-label="April 18, 2022">18</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2022-04-19" aria-labelledby="fc-dom-48">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-48" class="fc-daygrid-day-number" aria-label="April 19, 2022">19</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2022-04-20" aria-labelledby="fc-dom-50">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-50" class="fc-daygrid-day-number" aria-label="April 20, 2022">20</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2022-04-21" aria-labelledby="fc-dom-52">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-52" class="fc-daygrid-day-number" aria-label="April 21, 2022">21</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2022-04-22" aria-labelledby="fc-dom-54">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-54" class="fc-daygrid-day-number" aria-label="April 22, 2022">22</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2022-04-23" aria-labelledby="fc-dom-56">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-56" class="fc-daygrid-day-number" aria-label="April 23, 2022">23</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr role="row">
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2022-04-24" aria-labelledby="fc-dom-58">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-58" class="fc-daygrid-day-number" aria-label="April 24, 2022">24</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2022-04-25" aria-labelledby="fc-dom-60">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-60" class="fc-daygrid-day-number" aria-label="April 25, 2022">25</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2022-04-26" aria-labelledby="fc-dom-62">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-62" class="fc-daygrid-day-number" aria-label="April 26, 2022">26</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2022-04-27" aria-labelledby="fc-dom-64">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-64" class="fc-daygrid-day-number" aria-label="April 27, 2022">27</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2022-04-28" aria-labelledby="fc-dom-66">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-66" class="fc-daygrid-day-number" aria-label="April 28, 2022">28</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2022-04-29" aria-labelledby="fc-dom-68">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-68" class="fc-daygrid-day-number" aria-label="April 29, 2022">29</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2022-04-30" aria-labelledby="fc-dom-70">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-70" class="fc-daygrid-day-number" aria-label="April 30, 2022">30</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr role="row">
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past fc-day-other" data-date="2022-05-01" aria-labelledby="fc-dom-72">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-72" class="fc-daygrid-day-number" aria-label="May 1, 2022">1</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past fc-day-other" data-date="2022-05-02" aria-labelledby="fc-dom-74">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-74" class="fc-daygrid-day-number" aria-label="May 2, 2022">2</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past fc-day-other" data-date="2022-05-03" aria-labelledby="fc-dom-76">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-76" class="fc-daygrid-day-number" aria-label="May 3, 2022">3</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past fc-day-other" data-date="2022-05-04" aria-labelledby="fc-dom-78">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-78" class="fc-daygrid-day-number" aria-label="May 4, 2022">4</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past fc-day-other" data-date="2022-05-05" aria-labelledby="fc-dom-80">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-80" class="fc-daygrid-day-number" aria-label="May 5, 2022">5</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past fc-day-other" data-date="2022-05-06" aria-labelledby="fc-dom-82">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-82" class="fc-daygrid-day-number" aria-label="May 6, 2022">6</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past fc-day-other" data-date="2022-05-07" aria-labelledby="fc-dom-84">
                                                                                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a id="fc-dom-84" class="fc-daygrid-day-number" aria-label="May 7, 2022">7</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('scripts')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            eventClick: function(info) {
                var eventObj = info.event;

                if (eventObj.url) {
                    alert(
                        'Clicked ' + eventObj.title + '.\n' +
                        'Will open ' + eventObj.url + ' in a new tab'
                    );

                    window.open(eventObj.url);

                    info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
                } else {
                    alert('Clicked ' + eventObj.title);
                }
            },
            initialDate: '2022-04-15',
            events: [{
                    title: 'simple event',
                    start: '2022-04-02'
                },
                {
                    title: 'event with URL',
                    url: 'https://www.google.com/',
                    start: '2022-04-03'
                }
            ]
        });

        calendar.render();
    });
</script>
@endsection
@endsection