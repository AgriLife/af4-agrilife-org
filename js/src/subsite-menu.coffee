(($) ->
  'use strict'
  $ ->
    $sticky = $ '.subsite-menu .sticky-menu'
    $anchor = $ '#first-image'
    positionMenu = ()->
      scrollPos = $(window).scrollTop()
      anchorOffset = $anchor.offset()
      anchorDistanceFromViewport =
        top: anchorOffset.top - scrollPos,
        bottom: (scrollPos + window.innerHeight) - (anchorOffset.top + $anchor.outerHeight())

      if anchorDistanceFromViewport.bottom <= 0
        # If the bottom of the anchor is below or at the viewport, anchor the menu to the bottom.
        if $sticky.hasClass('anchorMove') is true
          $sticky.css('top', '').removeClass 'anchorMove'
        if $sticky.hasClass('anchorBottom') is false
          $sticky.removeClass('anchorTop').addClass 'anchorBottom'
      else if anchorDistanceFromViewport.bottom + $sticky.outerHeight() >= window.innerHeight
        # If the bottom of the anchor plus the height of the menu is greater than or equal to the height of the viewport, anchor menu to top.
        if $sticky.hasClass('anchorMove') is true
          $sticky.css('top', '').removeClass 'anchorMove'
        if $sticky.hasClass('anchorTop') is false
          $sticky.removeClass('anchorBottom').addClass 'anchorTop'
      else if $sticky.hasClass('anchorMove') is false
        # Else scroll menu with container between top and bottom.
        if $sticky.hasClass('anchorTop') is true
          $sticky.removeClass 'anchorTop'
        if $sticky.hasClass('anchorBottom') is true
          $sticky.removeClass 'anchorBottom'
        $sticky.addClass 'anchorMove'
        bottomOfAnchor = anchorOffset.top + $anchor.outerHeight()
        topPositionOfMenu = bottomOfAnchor - $sticky.parent().offset().top - $sticky.outerHeight()
        $sticky.css 'top', topPositionOfMenu

    $(window).one 'load', ()->
      positionMenu()
      $(window).on 'scroll', positionMenu

    $(window).on 'resize', positionMenu

    return
) jQuery
