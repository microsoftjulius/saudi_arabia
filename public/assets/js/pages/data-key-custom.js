$(document).ready(function() {
    setTimeout(function() {

        // [ Basic Initialisation ]
        $('#basic-key-table').DataTable({
            keys: true
        });

        // [ Scrolling Table ]
        var skeytable = $('#scrool-key').DataTable({
            scrollY: 300,
            paging: false,
            keys: true
        });

        // [ Focus Cell Custom Styling ]
        $('#focus-key').DataTable({
            keys: true
        });

        // [ Key Table Events ] 
        var events = $('#events');
        var ekt = $('#events-key-table').DataTable( {
            keys: true
        } );

        ekt
            .on( 'key', function ( e, datatable, key, cell, originalEvent ) {
                events.prepend( '<div>Key press: '+key+' for cell <i>'+cell.data()+'</i></div>' );
            } )
            .on( 'key-focus', function ( e, datatable, cell ) {
                events.prepend( '<div>Cell focus: <i>'+cell.data()+'</i></div>' );
            } )
            .on( 'key-blur', function ( e, datatable, cell ) {
                events.prepend( '<div>Cell blur: <i>'+cell.data()+'</i></div>' );
            } )

    }, 350);
});
