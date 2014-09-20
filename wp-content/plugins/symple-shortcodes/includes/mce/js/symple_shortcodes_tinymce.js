(function() {	
    // tinymce.create('tinymce.plugins.sympleShortcodeMce', {
    tinymce.PluginManager.add("symple_shortcodes", function(editor, url) {
        var btn = editor.addButton('symple_shortcodes_button', {
            type: "splitbutton",
            title: "Insert Shortcode",
            menu: [
                {
                    text: 'Verona Shortcodes',
                    classes: 'mceMenuItemTitle',
                    disabled: true
                },
                {
                    text: "Columns",
                    menu: [
                        { text: "One Half", value: "half", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "One Third", value: "third", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "One Fourth", value: "fourth", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "One Fifth", value: "fifth", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "One Sixth", value: "sixth", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Two Thirds", value: "two_third", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Three Fourths", value: "three_quarter", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Two Fifths", value: "two_fifth", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Three Fifths", value: "three_fifth", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Fourth Fifths", value: "four_fifth", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Five Sixths", value: "fifth_sixth", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                    ]
                },
                {
                    text: "Elements",
                    menu: [
                        { text: "Alert", value: "alert", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Band", value: "band", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Button", value: "button", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Callout", value: "callout", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Google Map", value: "googlemap", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Pricing Table", value: "pricing", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Title", value: "title", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Social Icon", value: "social", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                    ]
                },
                {
                    text: "Contents",
                    menu: [
                        { text: "Latest Posts", value: "latest_posts", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Popular Menu", value: "popular_menu", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Newsletter Widget", value: "widget", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                    ]
                },
                {
                    text: "Videos",
                    menu: [
                        { text: "YouTube", value: "youtube", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Vimeo", value: "vimeo", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                    ]
                },
                {
                    text: "Boxes",
                    menu: [
                        { text: "Box", value: "box", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Boxes", value: "boxes", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                    ]
                },
                {
                    text: "Highlights",
                    menu: [
                        { text: "Black", value: "blackHighlight", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Blue", value: "blueHighlight", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Gray", value: "grayHighlight", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Green", value: "greenHighlight", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Red", value: "redHighlight", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Yellow", value: "yellowHighlight", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Orange", value: "orangeHighlight", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                    ]
                },
                {
                    text: "Dividers",
                    menu: [
                        { text: "Solid", value: "solidDivider", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Dashed", value: "dashedDivider", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Dotted", value: "dottedDivider", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Double", value: "doubleDivider", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "FadeIn", value: "fadeinDivider", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "FadeOut", value: "fadeoutDivider", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                    ]
                },
                {
                    text: "jQuery",
                    menu: [
                        { text: "Accordion", value: "accordion", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Tabs", value: "tabs", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Toggle", value: "toggle", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                    ]
                },
                {
                    text: "Other",
                    menu: [
                        { text: "Spacing", value: "spacing", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                        { text: "Clear Floats", value: "clear", onclick: function(e) { e.stopPropagation(); insertContent(this.value()); } },
                    ]
                }
            ],
            onclick: function() {}
        });

        var insertContent = function(id) {

            // Selected content
            var mceSelected = editor.selection.getContent();

            // Add highlighted content inside the shortcode when possible - yay!
            if ( mceSelected ) {
                var sympleDummyContent = mceSelected;
            } else {
                var sympleDummyContent = 'Sample Content';
            }

            // Accordion
            if(id == "accordion") {
                editor.insertContent('[accordion]<br />[accordion_section title="Section 1"]<br />Accordion Content<br />[/accordion_section]<br />[accordion_section title="Section 2"]<br />Accordion Content<br />[/accordion_section]<br />[/accordion]');
            }

            // Alerts
            if(id == "alert") {
                editor.insertContent('[alert type="error-notice-info-success"]Your Content displayed in the alert box[/alert]');
            }

            // Latest Posts
            if(id == "latest_posts") {
                editor.insertContent('[latest_posts fromcategory="" icon="" title="Latest Blog Posts" description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo." linkurl="#" linkname="See all posts"]');
            }

            // Popular Menu
            if(id == "popular_menu") {
                editor.insertContent('[popular_menu fromcategory="" icon="" title="Most Popular" prices="show" description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo." linkurl="#" linkname="See all menu"]');
            }

            // Newsletter Widget
            if(id == "widget") {
                editor.insertContent('[mailchimpsf_form]');
            }



            // Box
            if(id == "box") {
                editor.insertContent('[box]Your Content displayed in a row or box[/box]');
            }

            // Boxes
            if(id == "boxes") {
                editor.insertContent('[box]<br />[boxes title="Fast Service" image="wp-content/themes/verona/images/icons/services/soup.png"]Lorimaem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.[/boxes]<br />[boxes title="Usefull Menu" image="wp-content/themes/verona/images/icons/services/dishes.png"]Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor.[/boxes]<br />[boxes title="World Class"  image="wp-content/themes/verona/images/icons/services/coffee.png"]An advanced custom panel that will make your editing easier like never before, check and enjoy![/boxes][boxes title="Quality Food" image="wp-content/themes/verona/images/icons/services/chicken.png"]Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. [/boxes][/box]');
            }



            // Band
            if(id == "band") {
                editor.insertContent('[band background_color="#150803" background_image="http://yoururltotheimage.com/image.jpg" type=""]Put your content text here or put new shortcodes[/band]');
            }
            // Button
            if(id == "button") {
                editor.insertContent('[button color="#ff7400" url="http://www.suitstheme.com" title="Visit Site" target="blank" border_radius="" arrow="yes"]' + sympleDummyContent + '[/button]');
            }


            //Videos
            //Youtube
            if(id == "youtube") {
                editor.insertContent('[youtube id="" width="300" height="168" responsive="no"][/youtube]');
            }

            //Vimeo
            if(id == "vimeo") {
                editor.insertContent('[vimeo id="" width="300" height="168" color="FF7409" responsive="no"][/vimeo]');
            }

            // Clear Floats
            if(id == "clear") {
                editor.insertContent('[clear_floats]');
            }




            // Callout
            if(id == "callout") {
                editor.insertContent('[callout background_color="#68524A" text_color="#fff" button_text="button text" button_color="white" button_text_color="#000" button_url="http://www.suitstheme.com" button_rel="nofollow"]' + sympleDummyContent + '[/callout]');
            }




            // Columns
            // One Half Column
            if(id == "half") {
                editor.insertContent('[half]<br />Your Content Goes Here<br />[/half]');
            }
            // One Third Column
            if(id == "third") {
                editor.insertContent('[third]<br />Your Content Goes Here<br />[/third]');
            }

            // One Fourth Column
            if(id == "fourth") {
                editor.insertContent('[fourth]<br />Your Content Goes Here<br />[/fourth]');
            }

            // One Fifth Column
            if(id == "fifth") {
                editor.insertContent('[fifth]<br />Your Content Goes Here<br />[/fifth]');
            }

            // One Sixth Column
            if(id == "sixth") {
                editor.insertContent('[sixth]<br />Your Content Goes Here<br />[/sixth]');
            }

            // Two Third Column
            if(id == "two_third") {
                editor.insertContent('[two_third]<br />Your Content Goes Here<br />[/two_third]');
            }

            // Two Fifth Column
            if(id == "two_fifth") {
                editor.insertContent('[two_fifth]<br />Your Content Goes Here<br />[/two_fifth]');
            }

            // Three Fourth Column
            if(id == "three_quarter") {
                editor.insertContent('[three_quarter]<br />Your Content Goes Here<br />[/three_quarter]');
            }
            // Three Fifth Column
            if(id == "three_fifth") {
                editor.insertContent('[three_fifth]<br />Your Content Goes Here<br />[/three_fifth]');
            }

            // Four Fifth Column
            if(id == "four_fifth") {
                editor.insertContent('[four_fifth]<br />Your Content Goes Here<br />[/four_fifth]');
            }

            // Fifth Sixth Column
            if(id == "fifth_sixth") {
                editor.insertContent('[fifth_sixth]<br />Your Content Goes Here<br />[/fifth_sixth]');
            }



            // Divider
            if(id == "solidDivider") {
                editor.insertContent('[divider style="solid" margin_top="20px" margin_bottom="20px"]');
            }
            if(id == "dashedDivider") {
                editor.insertContent('[divider style="dashed" margin_top="20px" margin_bottom="20px"]');
            }
            if(id == "dottedDivider") {
                editor.insertContent('[divider style="dotted" margin_top="20px" margin_bottom="20px"]');
            }
            if(id == "doubleDivider") {
                editor.insertContent('[divider style="double" margin_top="20px" margin_bottom="20px"]');
            }
            if(id == "fadeinDivider") {
                editor.insertContent('[divider style="fadein" margin_top="20px" margin_bottom="20px"]');
            }
            if(id == "fadeoutDivider") {
                editor.insertContent('[divider style="fadeout" margin_top="20px" margin_bottom="20px"]');
            }




            // Google Map
            if(id == "googlemap") {
                editor.insertContent('[googlemap title="Envato Office" location="2 Elizabeth St, Melbourne Victoria 3000 Australia" zoom="10" height=250]');
            }




            // Heading
            if(id == "title") {
                editor.insertContent('[title type="h2" title="' + sympleDummyContent + '" margin_top="20px;" margin_bottom="20px" text_align="left"]');
            }




            // Highlight
            if(id == "blueHighlight") {
                editor.insertContent('[highlight color="blue"]' + sympleDummyContent + '[/highlight]');
            }
            if(id == "grayHighlight") {
                editor.insertContent('[highlight color="gray"]' + sympleDummyContent + '[/highlight]');
            }
            if(id == "greenHighlight") {
                editor.insertContent('[highlight color="green"]' + sympleDummyContent + '[/highlight]');
            }
            if(id == "redHighlight") {
                editor.insertContent('[highlight color="red"]' + sympleDummyContent + '[/highlight]');
            }
            if(id == "yellowHighlight") {
                editor.insertContent('[highlight color="yellow"]' + sympleDummyContent + '[/highlight]');
            }
            if(id == "blackHighlight") {
                editor.insertContent('[highlight color="black"]' + sympleDummyContent + '[/highlight]');
            }   
            if(id == "orangeHighlight") {
                editor.insertContent('[highlight color="orange"]' + sympleDummyContent + '[/highlight]');
            }                       


            // Pricing
            if(id == "pricing") {
                editor.insertContent('[pricing_table]<br />[pricing size="half" plan="Free" cost="0" currency="$" per="Per month" button_url="#" button_text="Sign Up" button_color="#ff7400" button_border_radius="" button_target="self" button_rel="nofollow" position=""]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/pricing]<br /><br />[pricing size="half" position="last" featured="yes" plan="Basic" cost="19.99" currency="$" per="Per month" button_url="#" button_text="Sign Up" button_color="#ff7400" button_border_radius="" button_target="self" button_rel="nofollow"]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/pricing]<br />[/pricing_table]');
            }




            //Spacing
            if(id == "spacing") {
                editor.insertContent('[spacing size="40px"]');
            }




            //Social
            if(id == "social") {
                editor.insertContent('[social icon="twitter" version="big or small" url="http://www.twitter.com" title="Follow Us" target="self" rel=""]');
            }




            //Skillbar
            // if(id == "skillbar") {
            //  editor.insertContent('[skillbar title="' + sympleDummyContent + '" percentage="100" color="#6adcfa"]');
            // }




            //Tabs
            if(id == "tabs") {
                editor.insertContent('[tabgroup]<br />[tab title="First Tab"]<br />First tab content<br />[/tab]<br />[tab title="Second Tab"]<br />Second Tab Content.<br />[/tab]<br />[tab title="Third Tab"]<br />Third Tab Content.<br />[/tab]<br />[/tabgroup]');
            }



            //Testimonial
            if(id == "testimonial") {
                editor.insertContent('[testimonial by="Your Client"]' + sympleDummyContent + '[/testimonial]');
            }



            //Toggle
            if(id == "toggle") {
                editor.insertContent('[toggle title="This Is Your Toggle Title"]' + sympleDummyContent + '[/toggle]');
            }
        }	
	});
})();