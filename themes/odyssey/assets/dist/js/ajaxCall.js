/*jQuery( document ).on( 'click', '#all_cats ul li', function() {
    var post_id = jQuery(this).attr('post-id');


    jQuery.ajax({
        url : ajaxUrlObj.ajax_url,
        type : 'post',
        data : {
            action : 'getProIndustries',
            post_id : post_id
        },
        success : function( response ) {
            var all_indus_cats = jQuery('#all_indus').find('ul');
            all_indus_cats.empty();
            all_indus_cats.append(response);
        }
    });
})*/

jQuery(document).ready(function(){
    // store filter for each group
    var buttonFilters = {};
    var buttonFilter;
    // quick search regex
    var qsRegex;

    // init Isotope
    var $grid = jQuery('.grid').isotope({
      itemSelector: '.element-item',
      filter: function() {
        var $this = jQuery(this);
        var searchResult = qsRegex ? $this.text().match( qsRegex ) : true;
        var buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
        return searchResult && buttonResult;
      },
    });

    jQuery('.filters').on( 'click', '.button', function() {
      var $this = jQuery(this);
      // get group key
      var $buttonGroup = $this.parents('ul');
      var filterGroup = $buttonGroup.attr('data-filter-group');
      // set filter for group
      buttonFilters[ filterGroup ] = $this.attr('data-filter');
      // combine filters
      buttonFilter = concatValues( buttonFilters );
      // Isotope arrange
      $grid.isotope();
    });

    // use value of search field to filter
    var $quicksearch = jQuery('.quicksearch').keyup( debounce( function() {
      qsRegex = new RegExp( $quicksearch.val(), 'gi' );
      $grid.isotope();
    }) );

    // change is-checked class on buttons
    jQuery('.button-group').each( function( i, buttonGroup ) {
      var $buttonGroup = jQuery( buttonGroup );
      $buttonGroup.on( 'click', 'button', function() {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        jQuery( this ).addClass('is-checked');
      });
    });
      
    // flatten object by concatting values
    function concatValues( obj ) {
      var value = '';
      for ( var prop in obj ) {
        value += obj[ prop ];
      }
      return value;
    }

    // debounce so filtering doesn't happen every millisecond
    function debounce( fn, threshold ) {
      var timeout;
      threshold = threshold || 100;
      return function debounced() {
        clearTimeout( timeout );
        var args = arguments;
        var _this = this;
        function delayed() {
          fn.apply( _this, args );
        }
        timeout = setTimeout( delayed, threshold );
      };
    }

   
   
});