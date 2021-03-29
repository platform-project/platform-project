Version history:

<<<<<<< .mine
3.2.5
-----
- scrubber was not moving with RTMP audio: http://code.google.com/p/flowplayer-core/issues/detail?id=190

=======
3.2.5
-----
- buffer bar is not unnecessary reset (cleared) when seeking: http://code.google.com/p/flowplayer-core/issues/detail?id=198

>>>>>>> .r1377
3.2.4
-----
Fixes:
- Play/pause button was left in wrong state when started playing after a stop() call or a stop button click
- The tooltip texts are not treated as HTML any more. This way you can have labels like '<play>'
- Scrubber fixed to work with instream clips

3.2.3
-----
- Added possibility to configure margins and widget spacing. For example { margins: [0,2,0,2], spacing: { all: 0, play: 10 } }
Fixes:
- the progress bar now stays in sync with the scrubber handle: http://code.google.com/p/flowplayer-core/issues/detail?id=141

3.2.2
-----
Fixes
- Fixed current time when clip finishes before the specified duration
- Fixed change the button states when only onStart is dispatched and no onMetadata, bug #120

3.2.1
-----

Fixes:
- Wrong scrubber behavior when seek was prevented

3.2.0
-----
- New external methods and some existing methods renamed. New set of methods for setting and getting things:
    getConfig(), setWidgets(), getWidgets(), setAutoHide(), getAutoHide(), setTooltips(), getTooltips(), setEnabled(), getEnabled()
- AutoHide related properties are now given in a new 'autoHide' configuration object.
- Smoother movement of the scrubber, especially with short clips.
- Added new setAutoHide() external method, for example setAutoHide({ enabled: true, fullscreenOnly: false, delay: 1000, duration: 1000, style: 'fade', mouseOutDelay: 500 })
- Added mouseOutDelay in autoHide config
- Controlbar is now by default centered horizontally. Now when you specify a widht that is less than 100% it by default is
centered nicely.
 The tooltips() public method renamed to setTooltips()
- Added a marginBottom field in the tooltip configuration that allows the tooltip to be closer (or not) from the control bar
- Added timeBorder, timeBorderColor and timeBorderWidth
- Added more flexibility in slow motion buttons configuration. You can now hide/show them separately

Fixes:
- Setting scrubber height ratio using $f().getControls().css({ scrubberHeightRatio: 0.9 }) needed 2 calls to take effect
- borderColor has now precedence on border
- fixed use of controls: null in configuration 
- fixed timeView size
- now hides controls when autoHide is set and mouse leaves stage, with mouseOutDelay
- defaulted autoHide=always on modern
- fixed slider when mouseup out of the stage
- fixed $f().getControls().css({ tooltipTextColor: '#xxxxxx' })
- fixed progressbar issue when resizing while seeking 
- fixed scrubber behaviour with instream clips and specific controlbar configuration
- fixed autoHide behavior
- fixed gradient positioning in sliders
- fixed tooltip that was not hiding
- fixed controlbar with semi transparent background hiding even if mouse is over

3.1.4
-----
- new events onBeforeHidden & onBeforeShowed
Fixes:
- the volume slider tooltip does not show negative values any more

3.1.3
-----
- timeBgColor: 'transparent' now hides the background color of the time display
Fixes:
- Scrubber stopped moving when seeking if it was not shown initially and later enabled using the widgets() call.
- It was possible to move the scrubber to time that was larger than the clip's duration
- The scrubber tooltip time value is now more accurate
- The tube skin's scrubber no longer extends to touch the button right to it if the time view is hidden

3.1.2
-----
- Dispatches events when autohiding: onShowed & onHidden
- Now it's possible to have several controlbars that all autohide.
- Scrubber moving now smoother
- The scrubber time tooltip now always shown when hovering the mouse over the scrubber bar

3.1.1
-----
- Possibility to have controlbar configurations in clips
- A live stream can have a duration and after that the duration is shown in the controlbar
Fixes:
- Play/pause tooltip was not changed when clicking the button, if mouse was moved out and into the button before clicking.

3.1.0
-----
- New 'tube" skin and improved skinnability
- Tooltips
Fixes:
- fixed setting button enabled states in config
- now fullscreen works with Flash versions older than 9.0.115, in versions that do not support hardware scaling
- the scrubber is disabled if the clip is not seekable in the first frame: http://flowplayer.org/forum/8/16526 

3.0.3
-----
- fixed outHide hide to hide when moving the mouse out of the controlbar area
- enable() method was renamed to widgets()
- new enable() method to set the buttons' and widgets' enabled state
- Fixed: controlbar went hidden when exiting from hardware scaled fullscreen

3.0.2
-----
- improved scrubbing: Cannot click on unbuffered areas when random seeking is not enabled (streaming server not used).
  The scrubber now has hand cursor enabled on areas where seeking can be done.
- No longer hides the controlbar when mouse is over it (when autoHide is used)
- Fixed the controlbar disappearing and not appearing again when autoHide is used
- dispatches the LOAD event when initialized (needed for flowplayer 3.0.2 compatibility)

3.0.1
-----
- mute volume button shows the muted state correctly initially when it has been loaded

3.0.0
-----
- does not show the duration for live feeds
- pause button goes to play mode when closeBuffering() was called in the player

beta7
-----
- tweaking autoHide
- added hideDelay config option
- fixed scrubber to work with images that have a duration in the playlist

beta6
-----
- fix to prevent the buffer bar to grow out of bounds if supplying a bufferEnd value that is larger than clip's duration

beta5
-----
- compatibility with core beta6

beta4
-----
- play-button was not positioned at zero y position, fixed now

beta3
-----
- backward seeking by just clicking on the timeline did not work with the default http provider

beta2
-----
- fixed autohiding on HW scaled fullscreen
- made it easier to use the controls when autoHiding is enabled

beta1
-----
- First public beta release
