(($) ->
  'use strict'
  $ ->
    $sticky = $ '.af4-sticky-top-bottom'
    if $sticky.length > 0
      # Convert data attribute to object
      $args = {}
      if $sticky.data 'ag-options'
        $args = '"' + $sticky.data('ag-options').replace(/;$/,'').replace(/:/g,'":"').replace(/;/g,'";"') + '"'
        $args = $args.replace(/:"([\d]+)"?/g,':$1').replace(/;/g,',')
        $args = '{' + $args + '}'
      $sticky.data 'ag-options', JSON.parse $args
      # Set CSS
      $sticky.css 'width', '100%'
      # Find top constraint target as existing top sticky
      $topOffsetTarget = $ '.sticky'
        .filter ( index )->
          return $(this).data('zfPlugin').options.stickTo is 'top' and
          Foundation.MediaQuery.atLeast($(this).data('zfPlugin').options.stickyOn) is true
      # Find element to anchor around
      $anchor = $ '.af4-sticky-top-bottom-anchor, .site-header .unit-header-wrap'

      positionMenu = (evt)->
        scrollPos = $(window).scrollTop()
        anchorOffset = $anchor.offset()
        otherStickyHeight = 0
        stickyHeightOffset = $sticky.outerHeight()
        if $sticky.data('ag-options') and $sticky.data('ag-options')["anchorMove"] and $sticky.data('ag-options')['anchorMove'] is 'inPlace'
          stickyHeightOffset = 0
          $sticky.parent().css 'height', $sticky.outerHeight()

        if $topOffsetTarget.length > 0
          otherStickyHeight = $topOffsetTarget.outerHeight()
        anchorDistanceFromViewport =
          top: anchorOffset.top - scrollPos,
          bottom: (scrollPos + window.innerHeight) - (anchorOffset.top + $anchor.outerHeight())
        if anchorDistanceFromViewport.bottom <= 0
          # If the bottom of the anchor is below or at the viewport, anchor the menu to the bottom.
          if $sticky.hasClass('anchorMove') is true
            $sticky.css('top', '').removeClass 'anchorMove'
          if $sticky.hasClass('anchorBottom') is false
            $sticky.removeClass('anchorTop').addClass 'anchorBottom'
        else if anchorDistanceFromViewport.bottom + stickyHeightOffset + otherStickyHeight >= window.innerHeight
          # If the bottom of the anchor plus the height of the menu is greater than or equal to the height of the viewport, anchor menu to top.
          if $sticky.hasClass('anchorMove') is true
            $sticky.css('top', '').removeClass 'anchorMove'
          if $sticky.hasClass('anchorTop') is false
            $sticky.removeClass('anchorBottom').addClass 'anchorTop'
              .css 'top', otherStickyHeight
        else if $sticky.hasClass('anchorMove') is false
          # Else scroll menu with container between top and bottom.
          if $sticky.hasClass('anchorTop') is true
            $sticky.removeClass 'anchorTop'
          if $sticky.hasClass('anchorBottom') is true
            $sticky.removeClass 'anchorBottom'
          $sticky.addClass 'anchorMove'
          bottomOfAnchor = anchorOffset.top + $anchor.outerHeight()
          topPositionOfMenu = bottomOfAnchor - $sticky.parent().offset().top - stickyHeightOffset
          topPositionOfMenu = parseInt topPositionOfMenu
          $sticky.css 'top', topPositionOfMenu

        if evt and evt.type is 'resize'
          if $sticky.hasClass('anchorTop') and parseInt($sticky.css('top')) isnt otherStickyHeight
            $sticky.css('top', otherStickyHeight)
          else if $sticky.hasClass('anchorBottom')
            $sticky.css('top', '')

      $(window).one 'load', ()->
        positionMenu()
        $(window).on 'scroll', positionMenu

      $(window).on 'resize', positionMenu

    return
) jQuery
