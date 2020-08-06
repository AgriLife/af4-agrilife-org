(($) ->
  'use strict'
  $ ->
    $sticky = $ '.subsite-menu .sticky-menu'
    $anchor = $ '#' + $sticky.attr 'data-anchor'

    setStickToTop = ->
      $sticky.data 'zfPlugin'
        .options.stickTo = 'top'
      $sticky.data 'zfPlugin'
        .options.anchor = ''
      $sticky.data 'zfPlugin'
        .topPoint = -15
      $sticky.data 'zfPlugin'
        .points =
          0:1
          1:$ document
            .height()
      $sticky.removeClass 'is-at-bottom'
      $sticky.foundation '_calc', true

    setStickToBottom = ->
      $sticky.data 'zfPlugin'
        .options.stickTo = 'bottom'
      $sticky.data 'zfPlugin'
        .options.anchor = $sticky.attr 'data-anchor'
      $sticky.data 'zfPlugin'
        .options.anchorHeight = $anchor[0].getBoundingClientRect().height
      $sticky.removeClass 'is-at-top'
      delete $sticky.data 'zfPlugin'
        .topPoint
      delete $sticky.data 'zfPlugin'
        .points
      $sticky.foundation '_calc', true

    switchToTop = (evt) ->
      if $sticky.data('zfPlugin').options.stickTo == 'bottom' and $sticky.offset().top - $(window).scrollTop() <= 0
        scrollListener = $sticky.data('zfPlugin').scrollListener
        # Convert to top anchor.
        setStickToTop()
        # Remove this event handler.
        $(window).off scrollListener, switchToTop
        # Add scroll listener to switch back to sticking to image.
        $(window).on scrollListener, switchToBottom

    unstickFromImage = (evt) ->
      if $sticky.data('zfPlugin').options.anchor == 'first-image'
        scrollListener = $sticky.data('zfPlugin').scrollListener
        $(window).on scrollListener, switchToTop
        $sticky.off 'sticky.zf.unstuckfrom:bottom', evt

    switchToBottom = (evt) ->
      if $anchor.offset().top + $anchor.outerHeight() - $(window).scrollTop() >= $sticky.data('zfPlugin').elemHeight
        scrollListener = $sticky.data('zfPlugin').scrollListener
        # Convert to bottom anchor.
        setStickToBottom()
        # Remove this event handler.
        $(window).off scrollListener, switchToBottom
        # Add scroll listener to switch back to sticking to image.
        $sticky.one 'sticky.zf.unstuckfrom:bottom', unstickFromImage

    # Set up initial events.
    $ window
      .on $sticky.data('zfPlugin').onLoadListener, switchToTop
    $sticky.one 'sticky.zf.unstuckfrom:bottom', unstickFromImage

    return
) jQuery
