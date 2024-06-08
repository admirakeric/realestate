$(document).ready(function () {
// Validate form and draggable elements
    let time_from = false, time_to = false, event_new_elem_ = 0, event_minutes_start, event_minutes_end;

    let currentDate = new Date();

    let save_data = false; // If it is true, time format is fine - make ajax request
    let event_date; // Date for event -- set value on onclick event on calendar day

    let api_link      = '/system/calendar-month-content';
    let api_link_days = '/system/calendar-day-content';

    // Parse url and read GET parameters from URL

    let getUrlParameter = function getUrlParameter(sParam) {
        let sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };

    // Calendar object

    let calendar = {
        wrapper: ".calendar",
        calendar_body : ".dynamic-body",
        name: 'calendar',
        buttons: ["NAZAD", "DANAS", "NAPRIJED", "CIJELI MJESEC", "NOVO ODSUSTVO"],
        week_days: ['Ponedjeljak', 'Utorak', 'Srijeda', 'Četvrtak', 'Petak', 'Subota', 'Nedjelja'],
        week_days_normal: [ 'Nedjelja', 'Ponedjeljak', 'Utorak', 'Srijeda', 'Četvrtak', 'Petak', 'Subota'],
        week_short: ['Pon', 'Uto', 'Sri', 'Čet', 'Pet', 'Sub', 'Ned'],
        week_days_short: ['Pon', 'Uto', 'Sri', 'Čet', 'Pet', 'Sub', 'Ned'],
        months_d: [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
        months_name: ["Januar", "Februar", "Mart", "April", "Maj", "Juni", "Juli", "August", "Septembar", "Oktobar", "Novembar", "Decembar"],
        custom_date: null,
        n_day: null,
        n_month: null,
        n_year: null,
        date: new Date(),
        year: null,
        month: null,
        day: null,
        week_day: null,
        save_url: '',
        saving: true,
        d_day_in_week : 'Utorak',
        d_date : '1. Septembar 2020',
        current_time : 0,
        d_today : new Date(),

        // Get the first day of week of month
        firstDay : function () {
            this.date.setDate(1);
            return this.date.getDay() - 0;
        },
        // Get duration of current month
        monthDuration : function () {
            return this.months_d[this.month];
        },
        // Get days of previous months - last couple of them
        previousMonth : function () {
            let day = (this.months_d[this.month - 1] - this.firstDay() + 1);

            if (this.month === 0) { day = (31 - this.firstDay() + 1);}

            return day;
        },
        daysInMonth : function (month, year) {
            return new Date(year, month, 0).getDate();
        },
        setPreviousMonth : function(index){
            return (new Date(this.year, this.month, 0).getDate()) - index + 1;
        },
        // Get the current year
        currentYear : function () {
            return (new Date()).getFullYear();
        },
        // Get the current month
        currentMonth : function () {
            return (new Date()).getMonth();
        },
        // Get the current day
        currentDay : function () {
            return (new Date()).getDate();
        },
        setDates : function () {
            if (!this.custom_date) this.date = new Date();
            else this.date = new Date(this.n_year, this.n_month, this.n_day);

            this.year = this.date.getFullYear();
            this.month = this.date.getMonth();
            this.day = this.date.getDate();
            this.week_day = this.date.getDay();

            // Every 4 year, February has 29 days
            if (this.year % 4 === 0) this.months_d[1] = 29;
        },
        createCalendar : function () {

            // Remove everything from calendar
            $(this.wrapper).empty();
            // vars.wrapper.contents(':not(#add-new-absence)').remove();

            // Set dates as we want it - initially it uses custom date
            this.setDates();

            // Let's start with building GUI
            this.createHeader();
            let value = this.createBody();

            //this.createSingleDay();
        },

        getCalendarContent : function (){
            $.ajax({
                type:'POST',
                url: api_link,
                data: { calendar_get_content: true, month: (this.month + 1), year : this.year, subject : getUrlParameter('predmet')},
                success:function(response){
                    response = JSON.parse(response);

                    if(response['code'] === '0000'){
                        $.each(response['data'], function (key, value) {
                            let date = new Date(key);

                            // console.log(key, value, date.getDate(), date.getMonth());

                            let event = $("<div>").attr('class', 'cv-events');
                            let titleOfEvent = '';

                            if(value.length !== 0){
                                for(let i=0; i<value.length; i++){

                                    let title = value[i]['visit_rel']['name'];
                                    event.append(function () {
                                        return $("<div>").attr('class', 'cv-e-event').attr('title', value[i]['visit_rel']['name'] + ' ' + value[i]['cDate'] + ' u ' + value[i]['time'] + 'h')
                                            .append($("<h5>").text(title.slice(0, 16) + '..'));
                                    });

                                    titleOfEvent += title + '\n';
                                }
                            }

                            event.attr('title', titleOfEvent);
                            $( "div[day="+ (date.getDate()) +"][month="+date.getMonth()+"]" ).append(function () {
                                return event;
                            });
                        });
                    }
                }
            });
        },

        createBody : function () {
            let days_counter = 0;  // serves for that, when we get the day of the week of month , that we are looking at,
                                   // then, we can start clocking -> it's current month

            let firstDay = this.firstDay() - 1;
            if(firstDay < 0) firstDay = 6;

            let lastMonthDays = this.previousMonth(); // Days of the last month
            let nextMonthDays = 1;

            lastMonthDays = this.setPreviousMonth(firstDay);

            // Here we set the month value in middle
            $(".month-on-top").html(this.months_name[this.month] + ' <span>' + this.year + '</span>');

            let row = '';       // Single row - represents a week in month

            for (let i = 0; i < 6; i++) {
                let col = '';   // Single column - represents a day in a week

                for (let j = 0; j < 7; j++) {
                    let day = 0;     // Value of single day
                    let day_t = '';
                    let month = 0;   // Use current month
                    let year = 0;   // Get current year
                    let class_name = ''; // when we want to give better view for current month

                    if (i === 0 && (j === firstDay)) days_counter++;

                    /******************************************************************************************************/
                    if (days_counter && days_counter < (this.monthDuration() + 1)) {
                        // Current month !
                        class_name = 'current-value'; // Bold text for current month
                        if (days_counter === this.currentDay() && this.year === this.currentYear() && this.month === this.currentMonth()) class_name += ' current-day';

                        day = days_counter++;
                        month = this.month;
                        year = this.year;

                        day_t = (this.d_today.getDate() === day && this.d_today.getMonth() === month && this.d_today.getFullYear() === year) ? '' : '';
                    }

                    /******************************************************************************************************/
                    else if (days_counter) {
                        // Next month
                        day = nextMonthDays++;
                        year = this.year;
                        if (this.month === 11) {
                            month = 0;
                            year = (this.year + 1);
                        } else month = (this.month + 1);

                        class_name = 'other-month';
                    }
                    if (!days_counter) {
                        // Previous month
                        day = lastMonthDays++;
                        year = this.year;
                        if (this.month === 0) {
                            month = 11;
                            year = (this.year - 1);
                        } else month = (this.month - 1);
                        class_name = 'other-month';
                    }

                    col += '<div class="calendar-col ' + class_name + '" year="' + year + '" month="' + (month) + '" day="' + day + '"><p>' + (day + day_t) + '</p> </div>';
                }


                // style="top: -'+ (i + 1)*5 +'px !important;"
                row += '<div class="calendar-row">' + col + '</div>';
                if (days_counter > this.monthDuration()) break;
            }

            $(this.wrapper).append('<div class="calendar-body dynamic-body">' + row + '</div>');

            // Finally, fill calendar days with events
            this.getCalendarContent();
        },
        createHeader : function () {
            $(this.wrapper).append('<div class="calendar-header"> <h1 class="month-on-top"></h1> <div class="mobile-close-calendar"> <i class="fas fa-times"></i> </div> <div class="buttons"> <div class="arrow-button previous-month"><i class="fas fa-angle-left"></i> </div> <div class="text-button this-month"> DANAS </div> <div class="arrow-button next-month"> <i class="fas fa-angle-right"></i> </div> <div class="text-button close-calendar" title="Zatvorite"> <i class="fas fa-times"></i> </div> </div> </div>');

            let row = '';
            for(let i=0; i < 7; i++){
                row += '<div class="calendar-col"> ' + ((window.innerWidth <= 800) ? this.week_days_short[i] : this.week_days[i]) + ' </div>';
            }

            $(this.wrapper).append( '<div class="calendar-body"> <div class="calendar-row small-row"> ' + row + ' </div> </div>');

        },

        createSingleDayHeader : function(){
            return '<div class="header-of-day"> <h2 id="name-of-single-day">' + this.d_day_in_week + ', ' + this.d_date + ' </h2> <div class="day-actions"><div class="inside-element back-to-full-calendar"> <i class="fas fa-angle-left"></i> <p>Nazad</p> </div> </div> </div>';
        },
        getHourValue : function(index){
            if(index < 10){return ('0' + index + ':00');}
            else return (index + ':00');

        },
        createSingleDayBody : function (day, month, year) {
            return '<div class="single-day-body"> <div class="events-wrapper"> </div> </div>';
        },
        createSingleDay : function (day, month, year) {
            $(this.wrapper).append( '<div class="full-day-preview"> ' + this.createSingleDayHeader() + this.createSingleDayBody(day, month, year) + ' </div>');

            // // Append current time line
            // let current_h = (new Date()).getHours();
            // let current_m = (new Date()).getMinutes();
            // let top_time = (current_h * 60) + current_m;
            //
            // $(".events-wrapper").append(
            //     '<div class="current-time-line" style="top:'+(top_time)+'px" title="Trenutno vrijeme '+current_h+':'+current_m+'">  </div>'
            // );
        },
        removeSingleDay : function () {
            $(this.wrapper).find(".full-day-preview").remove();
            $(".add-new-event-wrapper").fadeOut();
        }
    };

    $("body").on('click', '.next-month', function () {
        calendar.custom_date = true;
        calendar.n_day = calendar.day;
        if(calendar.month === 11){
            calendar.n_month = 0;
            calendar.n_year  = parseInt(calendar.year + 1);
        }else{
            calendar.n_month = (calendar.month + 1);
            calendar.n_year  = calendar.year;
        }
        calendar.createCalendar();
    });
    $("body").on('click', '.previous-month', function () {
        calendar.custom_date = true;
        calendar.n_day = calendar.day;
        if(calendar.month === 0){
            calendar.n_month = 11;
            calendar.n_year  = (calendar.year - 1);
        }else{
            calendar.n_month = (calendar.month - 1);
            calendar.n_year  = calendar.year;
        }
        calendar.createCalendar();
    });
    $("body").on('click', '.this-month', function () {
        calendar.custom_date = false;
        calendar.createCalendar();
    });


// ------------------------------------------------------------------------------------------------------------------ //
// ** Preview only one day -- data from calendar ** //

    let isToday = function(date){
        date = date.split('-');
        let y = date[0]; let m = date[1]; let d = date[2];

        let today = new Date();

        if(today.getFullYear() === parseInt(y) && (today.getMonth() === (parseInt(m) - 1)) && (today.getDate() === parseInt(d))) return true;
        return false;
    };

    let dayData = function(day, month, year){
        $(".loading-gif").removeClass('d-none');

        $.ajax({
            type:'POST',
            url: api_link_days,
            data: { date : (year + '-' + month + '-' + day)},
            success:function(response){
                response = JSON.parse(response);

                let value = '';

                if(response['code'] === '0000'){
                    for(let i=0; i<response['data'].length; i++){
                        console.log(response['data'][i]);
                        $(".events-wrapper").append(
                            "<div class=\"card mb-3\">\n" +
                            "  <div class=\"card-body\">\n" +
                            "    <h5 class=\"card-title\"> "+ response['data'][i]['visit_rel']['name'] +" </h5>\n" +
                            "    <p class=\"card-text\" title='Informacije o nekretnini'> " + response['data'][i]['visit_rel']['estate_rel']['title'] + " (" + response['data'][i]['cDate'] + " u " + response['data'][i]['time'] + "h" + ")" + " </p>\n" +
                            "    <p class=\"card-text\" title='Informacije o nekretnini'> Telefon: " + response['data'][i]['visit_rel']['phone'] + " </p>\n" +
                            "    <p class=\"card-text\" title='Informacije o nekretnini'> Email: " + response['data'][i]['visit_rel']['email'] + " </p>\n" +
                            "    <p class=\"card-text mt-2\" title='Informacije o nekretnini'> Poruka: " + response['data'][i]['visit_rel']['message'] + " </p>\n" +
                            "    <a href='/properties/preview/"+ response['data'][i]['visit_rel']['estate_rel']['slug'] +"' class=\"btn my-clr-btn btn-sm text-white\">Pregled nekretnine</a>\n" +
                            "  </div>\n" +
                            "</div>"
                        );

                    }
                }
                $(".loading-gif").addClass('d-none');
            }
        });
    };

    let showSingleDay = function(day, month, year){
        let date = new Date(year + '-' + month + '-' + day);

        console.log("date: " + date);
        console.log(day, month, year, date.getDay());


        calendar.d_day_in_week = calendar.week_days_normal[date.getDay()];
        calendar.d_date = day + '. ' + calendar.months_name[month - 1] + ' ' + year;

        // Get date for clicked "day"
        event_date = year + '-' + month + '-' + day;

        // First, check if there is any data for this particular day
        // let response = dayData(event_date);

        calendar.createSingleDay(day, month, year);

        dayData(day, month, year);
    };

    $("body").on('click', '.calendar-col, .sci-d', function () {
        let day   = $(this).attr('day');
        let month = (parseInt($(this).attr('month')) + 1);
        let year  = $(this).attr('year');

        showSingleDay(day, month, year);
    });
    $("body").on('click', '.back-to-full-calendar', function () {
        // Back to full calendar - reaload event_date

        calendar.createCalendar();
        calendar.removeSingleDay();
    });

    /******************************************************************************************************************/
    /*
     *  Switch between trainings and calendar
     */
    $("body").on('click', '.close-calendar, .open-calendar, .mobile-close-calendar', function () {
        $(".tiw-trainings").toggleClass('d-none');
        $(".tiw-calendar").toggleClass('d-none');

        if($(this).hasClass('open-calendar')) calendar.createCalendar();

        // $('body').scrollTo('#trainings-wrapper');
    });
    calendar.createCalendar();
});
