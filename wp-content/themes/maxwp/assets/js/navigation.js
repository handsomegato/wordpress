/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var maxwp_secondary_container, maxwp_secondary_button, maxwp_secondary_menu, maxwp_secondary_links, maxwp_secondary_i, maxwp_secondary_len;

    maxwp_secondary_container = document.getElementById( 'maxwp-secondary-navigation' );
    if ( ! maxwp_secondary_container ) {
        return;
    }

    maxwp_secondary_button = maxwp_secondary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof maxwp_secondary_button ) {
        return;
    }

    maxwp_secondary_menu = maxwp_secondary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof maxwp_secondary_menu ) {
        maxwp_secondary_button.style.display = 'none';
        return;
    }

    maxwp_secondary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === maxwp_secondary_menu.className.indexOf( 'nav-menu' ) ) {
        maxwp_secondary_menu.className += ' nav-menu';
    }

    maxwp_secondary_button.onclick = function() {
        if ( -1 !== maxwp_secondary_container.className.indexOf( 'maxwp-toggled' ) ) {
            maxwp_secondary_container.className = maxwp_secondary_container.className.replace( ' maxwp-toggled', '' );
            maxwp_secondary_button.setAttribute( 'aria-expanded', 'false' );
            maxwp_secondary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            maxwp_secondary_container.className += ' maxwp-toggled';
            maxwp_secondary_button.setAttribute( 'aria-expanded', 'true' );
            maxwp_secondary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    maxwp_secondary_links    = maxwp_secondary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( maxwp_secondary_i = 0, maxwp_secondary_len = maxwp_secondary_links.length; maxwp_secondary_i < maxwp_secondary_len; maxwp_secondary_i++ ) {
        maxwp_secondary_links[maxwp_secondary_i].addEventListener( 'focus', maxwp_secondary_toggleFocus, true );
        maxwp_secondary_links[maxwp_secondary_i].addEventListener( 'blur', maxwp_secondary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function maxwp_secondary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'maxwp-focus' ) ) {
                    self.className = self.className.replace( ' maxwp-focus', '' );
                } else {
                    self.className += ' maxwp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( maxwp_secondary_container ) {
        var touchStartFn, maxwp_secondary_i,
            parentLink = maxwp_secondary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, maxwp_secondary_i;

                if ( ! menuItem.classList.contains( 'maxwp-focus' ) ) {
                    e.preventDefault();
                    for ( maxwp_secondary_i = 0; maxwp_secondary_i < menuItem.parentNode.children.length; ++maxwp_secondary_i ) {
                        if ( menuItem === menuItem.parentNode.children[maxwp_secondary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[maxwp_secondary_i].classList.remove( 'maxwp-focus' );
                    }
                    menuItem.classList.add( 'maxwp-focus' );
                } else {
                    menuItem.classList.remove( 'maxwp-focus' );
                }
            };

            for ( maxwp_secondary_i = 0; maxwp_secondary_i < parentLink.length; ++maxwp_secondary_i ) {
                parentLink[maxwp_secondary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( maxwp_secondary_container ) );
} )();


( function() {
    var maxwp_primary_container, maxwp_primary_button, maxwp_primary_menu, maxwp_primary_links, maxwp_primary_i, maxwp_primary_len;

    maxwp_primary_container = document.getElementById( 'maxwp-primary-navigation' );
    if ( ! maxwp_primary_container ) {
        return;
    }

    maxwp_primary_button = maxwp_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof maxwp_primary_button ) {
        return;
    }

    maxwp_primary_menu = maxwp_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof maxwp_primary_menu ) {
        maxwp_primary_button.style.display = 'none';
        return;
    }

    maxwp_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === maxwp_primary_menu.className.indexOf( 'nav-menu' ) ) {
        maxwp_primary_menu.className += ' nav-menu';
    }

    maxwp_primary_button.onclick = function() {
        if ( -1 !== maxwp_primary_container.className.indexOf( 'maxwp-toggled' ) ) {
            maxwp_primary_container.className = maxwp_primary_container.className.replace( ' maxwp-toggled', '' );
            maxwp_primary_button.setAttribute( 'aria-expanded', 'false' );
            maxwp_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            maxwp_primary_container.className += ' maxwp-toggled';
            maxwp_primary_button.setAttribute( 'aria-expanded', 'true' );
            maxwp_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    maxwp_primary_links    = maxwp_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( maxwp_primary_i = 0, maxwp_primary_len = maxwp_primary_links.length; maxwp_primary_i < maxwp_primary_len; maxwp_primary_i++ ) {
        maxwp_primary_links[maxwp_primary_i].addEventListener( 'focus', maxwp_primary_toggleFocus, true );
        maxwp_primary_links[maxwp_primary_i].addEventListener( 'blur', maxwp_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function maxwp_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'maxwp-focus' ) ) {
                    self.className = self.className.replace( ' maxwp-focus', '' );
                } else {
                    self.className += ' maxwp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( maxwp_primary_container ) {
        var touchStartFn, maxwp_primary_i,
            parentLink = maxwp_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, maxwp_primary_i;

                if ( ! menuItem.classList.contains( 'maxwp-focus' ) ) {
                    e.preventDefault();
                    for ( maxwp_primary_i = 0; maxwp_primary_i < menuItem.parentNode.children.length; ++maxwp_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[maxwp_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[maxwp_primary_i].classList.remove( 'maxwp-focus' );
                    }
                    menuItem.classList.add( 'maxwp-focus' );
                } else {
                    menuItem.classList.remove( 'maxwp-focus' );
                }
            };

            for ( maxwp_primary_i = 0; maxwp_primary_i < parentLink.length; ++maxwp_primary_i ) {
                parentLink[maxwp_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( maxwp_primary_container ) );
} )();