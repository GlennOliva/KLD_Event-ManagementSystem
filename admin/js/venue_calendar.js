document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('venue-calendar'); // Referencing the calendar element

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth', // Default view is monthly
        selectable: true, // Allow users to select dates
        editable: true,  // Allow users to edit events
        events: []       // You can add an array of events here
    });

    calendar.render(); // Render the calendar
});