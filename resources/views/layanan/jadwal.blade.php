@extends('template.main')

@section('content')
<div class="content">
    <!-- Filter Container -->
    <div class="d-flex justify-content-center align-items-center mb-3" style="min-height: 80px;">
        <div class="filter-container text-center">
            <label for="filterYear" class="mr-2">Tahun:</label>
            <select id="filterYear" class="form-control d-inline-block w-auto">
                @for ($year = 2020; $year <= date('Y'); $year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>

            <label for="filterMonth" class="ml-3 mr-2">Bulan:</label>
            <select id="filterMonth" class="form-control d-inline-block w-auto">
                @for ($month = 1; $month <= 12; $month++)
                    <option value="{{ str_pad($month, 2, '0', STR_PAD_LEFT) }}">
                        {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                    </option>
                @endfor
            </select>

            <button id="applyFilter" class="btn btn-primary ml-3">Terapkan</button>
        </div>
    </div>

    <div id="calendar"></div>
</div>
<br>
<style>
.fc-tooltip {
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    pointer-events: none; /* Mencegah tooltip mengganggu klik */
}
</style>
<script src="{{ asset('cal/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('cal/js/popper.min.js') }}"></script>
<script src="{{ asset('cal/js/bootstrap.min.js') }}"></script>

<script src='{{ asset('cal/fullcalendar/packages/core/main.js') }}'></script>
<script src='{{ asset('cal/fullcalendar/packages/interaction/main.js') }}'></script>
<script src='{{ asset('cal/fullcalendar/packages/daygrid/main.js') }}'></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid'],
        defaultDate: '{{ date('Y-m-d') }}', // Default ke hari ini
        editable: true,
        eventLimit: true,
        events: [
            @foreach ($jadwal as $j)
            {
                title: '{{ $j->isi_jadwal }}',
                start: '{{ date('Y-m-d', strtotime($j->tanggal_awal)) }}',
                end: '{{ date('Y-m-d', strtotime($j->tanggal_akhir . ' +1 day')) }}',
                extendedProps: {
                    pic: '{{ $j->pic }}',
                    penyelenggara: '{{ $j->penyelenggara }}',
                    keterangan: '{{ $j->keterangan }}',
                    jamAwal: '{{ date('H:i', strtotime($j->jam_awal)) }}', // Menghapus detik
                    jamAkhir: '{{ date('H:i', strtotime($j->jam_akhir)) }}' // Menghapus detik
                }
            },
            @endforeach
        ],
        eventMouseEnter: function(info) {
            var tooltipContent = `
                <strong>${info.event.title}</strong><br>
                PIC: ${info.event.extendedProps.pic || 'N/A'}<br>
                Penyelenggara: ${info.event.extendedProps.penyelenggara || 'N/A'}<br>
                Keterangan: ${info.event.extendedProps.keterangan || 'N/A'}<br>
                Jam: ${info.event.extendedProps.jamAwal || 'N/A'} - ${info.event.extendedProps.jamAkhir || 'N/A'}
            `;

            var tooltip = document.createElement('div');
            tooltip.classList.add('fc-tooltip');
            tooltip.innerHTML = tooltipContent;
            document.body.appendChild(tooltip);

            tooltip.style.position = 'absolute';
            tooltip.style.top = info.jsEvent.pageY + 'px';
            tooltip.style.left = info.jsEvent.pageX + 'px';
            tooltip.style.zIndex = '1000';
            tooltip.style.background = 'rgba(0, 0, 0, 0.8)';
            tooltip.style.color = '#fff';
            tooltip.style.padding = '5px';
            tooltip.style.borderRadius = '4px';
            tooltip.style.fontSize = '12px';

            info.el.addEventListener('mouseleave', function() {
                tooltip.remove();
            });
        }
    });

    calendar.render();

    // Event untuk filter
    document.getElementById('applyFilter').addEventListener('click', function() {
        var year = document.getElementById('filterYear').value;
        var month = document.getElementById('filterMonth').value;

        var newDate = `${year}-${month}-01`; // Set ke tanggal 1 bulan tersebut
        calendar.gotoDate(newDate);
    });
});

</script>

<script src="{{ asset('cal/js/main.js') }}"></script>
@endsection

<link rel="stylesheet" href="{{ asset('cal/css/style.css') }}">
