(function() {	
	tinymce.create('tinymce.plugins.sympleShortcodeMce', {
		init : function(ed, url){
			tinymce.plugins.sympleShortcodeMce.theurl = url;
		},
		createControl : function(btn, e) {
			if ( btn == "symple_shortcodes_button" ) {
				var a = this;	
				var btn = e.createSplitButton('symple_button', {
	                title: "Insert Shortcode",
					image: tinymce.plugins.sympleShortcodeMce.theurl +"/../images/shortcodes.png",
					icons: false,
	            });
	            btn.onRenderMenu.add(function (c, b) {
					
					b.add({title : 'Verona Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
					
					
					// Columns
					c = b.addMenu({title:"Columns"});
					
						a.render( c, "One Half", "half" );
						a.render( c, "One Third", "third");
						a.render( c, "One Fourth", "fourth" );
						a.render( c, "One Fifth", "fifth" );
						a.render( c, "One Sixth", "sixth" );
						
						c.addSeparator();		
								
						a.render( c, "Two Thirds", "two_third" );
						a.render( c, "Three Fourths", "three_quarter" );
						a.render( c, "Two Fifths", "two_fifth" );
						a.render( c, "Three Fifths", "three_fifth" );
						a.render( c, "Fourth Fifths", "four_fifth" );
						a.render( c, "Five Sixths", "fifth_sixth" );
					
					b.addSeparator();
					
					
					// Elements
					c = b.addMenu({title:"Elements"});
						
						a.render( c, "Alert", "alert");
						a.render( c, "Band", "band" );
						a.render( c, "Button", "button" );
						a.render( c, "Callout", "callout" );
						a.render( c, "Google Map", "googlemap" );
						a.render( c, "Pricing Table", "pricing" );
						// a.render( c, "Skillbar", "skillbar" );
						a.render( c, "Title", "title" );
						a.render( c, "Social Icon", "social" );	
						// a.render( c, "Testimonial", "testimonial" );
					
					b.addSeparator();

					// Contents
					c = b.addMenu({title:"Contents"});

						a.render( c, "Latest Posts", "latest_posts");
						a.render( c, "Popular Menu", "popular_menu");
						// a.render( c, "Newsletter Widget", "widget");

					b.addSeparator();
					
					// Videos
					c = b.addMenu({title:"Videos"});
						
						a.render( c, "Youtube", "youtube" );
						a.render( c, "Vimeo", "vimeo" );
					
					b.addSeparator();


					// Boxes
					c = b.addMenu({title:"Boxes"});
					
					a.render( c, "Box", "box" );
					a.render( c, "Boxes", "boxes" );
						
					b.addSeparator();
					
					// Highlights
					c = b.addMenu({title:"Highlights"});
					
						a.render( c, "Black", "blackHighlight" );
						a.render( c, "Blue", "blueHighlight" );
						a.render( c, "Gray", "grayHighlight" );
						a.render( c, "Green", "greenHighlight" );
						a.render( c, "Red", "redHighlight" );
						a.render( c, "Yellow", "yellowHighlight" );
						a.render( c, "Orange", "orangeHighlight" );
						
					b.addSeparator();
					
					
					// Dividers
					c = b.addMenu({title:"Dividers"});
					
						a.render( c, "Solid", "solidDivider" );
						a.render( c, "Dashed", "dashedDivider" );
						a.render( c, "Dotted", "dottedDivider" );
						a.render( c, "Double", "doubleDivider" );
						a.render( c, "FadeIn", "fadeinDivider" );
						a.render( c, "FadeOut", "fadeoutDivider" );
						
					b.addSeparator();
					
					
					// jQuery
					c = b.addMenu({title:"jQuery"});
					
						a.render( c, "Accordion", "accordion" );
						a.render( c, "Tabs", "tabs" );
						a.render( c, "Toggle", "toggle" );
					
					b.addSeparator();
					
					
					// Helpers
					c = b.addMenu({title:"Other"});
					
						a.render( c, "Spacing", "spacing" );
						a.render( c, "Clear Floats", "clear" );
				});
	            
	          return btn;
			}
			return null;               
		},
		render : function(ed, title, id) {
			ed.add({
				title: title,
				onclick: function () {
					
					// Selected content
					var mceSelected = tinyMCE.activeEditor.selection.getContent();
					
					// Add highlighted content inside the shortcode when possible - yay!
					if ( mceSelected ) {
						var sympleDummyContent = mceSelected;
					} else {
						var sympleDummyContent = 'Sample Content';
					}
					
					// Accordion
					if(id == "accordion") {
						tinyMCE.activeEditor.selection.setContent('[accordion]<br />[accordion_section title="Section 1"]<br />Accordion Content<br />[/accordion_section]<br />[accordion_section title="Section 2"]<br />Accordion Content<br />[/accordion_section]<br />[/accordion]');
					}
					
					// Alerts
					if(id == "alert") {
						tinyMCE.activeEditor.selection.setContent('[alert type="error-notice-info-success"]Your Content displayed in the alert box[/alert]');
					}

					// Latest Posts
					if(id == "latest_posts") {
						tinyMCE.activeEditor.selection.setContent('[latest_posts fromcategory="" icon="" title="Latest Blog Posts" description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo." linkurl="#" linkname="See all posts"]');
					}
					
					// Popular Menu
					if(id == "popular_menu") {
						tinyMCE.activeEditor.selection.setContent('[popular_menu fromcategory="" icon="" title="Most Popular" prices="show" description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo." linkurl="#" linkname="See all menu"]');
					}

					// Newsletter Widget
					if(id == "widget") {
						tinyMCE.activeEditor.selection.setContent('[mailchimpsf_form]');
					}



					// Box
					if(id == "box") {
						tinyMCE.activeEditor.selection.setContent('[box]Your Content displayed in a row or box[/box]');
					}

					// Boxes
					if(id == "boxes") {
						tinyMCE.activeEditor.selection.setContent('[box]<br />[boxes title="Fast Service" image="wp-content/themes/verona/images/icons/services/soup.png"]Lorimaem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.[/boxes]<br />[boxes title="Usefull Menu" image="wp-content/themes/verona/images/icons/services/dishes.png"]Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor.[/boxes]<br />[boxes title="World Class"  image="wp-content/themes/verona/images/icons/services/coffee.png"]An advanced custom panel that will make your editing easier like never before, check and enjoy![/boxes][boxes title="Quality Food" image="wp-content/themes/verona/images/icons/services/chicken.png"]Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. [/boxes][/box]');
					}
					
					
					
					// Band
					if(id == "band") {
						tinyMCE.activeEditor.selection.setContent('[band background_color="#150803" background_image="http://yoururltotheimage.com/image.jpg" type=""]Put your content text here or put new shortcodes[/band]');
					}
					// Button
					if(id == "button") {
						tinyMCE.activeEditor.selection.setContent('[button color="#ff7400" url="http://www.suitstheme.com" title="Visit Site" target="blank" border_radius="" arrow="yes"]' + sympleDummyContent + '[/button]');
					}
					
					
					//Videos
					//Youtube
					if(id == "youtube") {
						tinyMCE.activeEditor.selection.setContent('[youtube id="" width="300" height="168" responsive="no"][/youtube]');
					}

				    //Vimeo
				    if(id == "vimeo") {
						tinyMCE.activeEditor.selection.setContent('[vimeo id="" width="300" height="168" color="FF7409" responsive="no"][/vimeo]');
					}
					
					// Clear Floats
					if(id == "clear") {
						tinyMCE.activeEditor.selection.setContent('[clear_floats]');
					}
					
					
					
					
					// Callout
					if(id == "callout") {
						tinyMCE.activeEditor.selection.setContent('[callout background_color="#68524A" text_color="#fff" button_text="button text" button_color="white" button_text_color="#000" button_url="http://www.suitstheme.com" button_rel="nofollow"]' + sympleDummyContent + '[/callout]');
					}
					
					
					
					
					// Columns
					// One Half Column
					if(id == "half") {
						tinyMCE.activeEditor.selection.setContent('[half]<br />Your Content Goes Here<br />[/half]');
					}
					// One Third Column
					if(id == "third") {
						tinyMCE.activeEditor.selection.setContent('[third]<br />Your Content Goes Here<br />[/third]');
					}

					// One Fourth Column
					if(id == "fourth") {
						tinyMCE.activeEditor.selection.setContent('[fourth]<br />Your Content Goes Here<br />[/fourth]');
					}

					// One Fifth Column
					if(id == "fifth") {
						tinyMCE.activeEditor.selection.setContent('[fifth]<br />Your Content Goes Here<br />[/fifth]');
					}

					// One Sixth Column
					if(id == "sixth") {
						tinyMCE.activeEditor.selection.setContent('[sixth]<br />Your Content Goes Here<br />[/sixth]');
					}

					// Two Third Column
					if(id == "two_third") {
						tinyMCE.activeEditor.selection.setContent('[two_third]<br />Your Content Goes Here<br />[/two_third]');
					}
					
					// Two Fifth Column
					if(id == "two_fifth") {
						tinyMCE.activeEditor.selection.setContent('[two_fifth]<br />Your Content Goes Here<br />[/two_fifth]');
					}

					// Three Fourth Column
					if(id == "three_quarter") {
						tinyMCE.activeEditor.selection.setContent('[three_quarter]<br />Your Content Goes Here<br />[/three_quarter]');
					}
					// Three Fifth Column
					if(id == "three_fifth") {
						tinyMCE.activeEditor.selection.setContent('[three_fifth]<br />Your Content Goes Here<br />[/three_fifth]');
					}

					// Four Fifth Column
					if(id == "four_fifth") {
						tinyMCE.activeEditor.selection.setContent('[four_fifth]<br />Your Content Goes Here<br />[/four_fifth]');
					}

					// Fifth Sixth Column
					if(id == "fifth_sixth") {
						tinyMCE.activeEditor.selection.setContent('[fifth_sixth]<br />Your Content Goes Here<br />[/fifth_sixth]');
					}
					
									
				
					// Divider
					if(id == "solidDivider") {
						tinyMCE.activeEditor.selection.setContent('[divider style="solid" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "dashedDivider") {
						tinyMCE.activeEditor.selection.setContent('[divider style="dashed" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "dottedDivider") {
						tinyMCE.activeEditor.selection.setContent('[divider style="dotted" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "doubleDivider") {
						tinyMCE.activeEditor.selection.setContent('[divider style="double" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "fadeinDivider") {
						tinyMCE.activeEditor.selection.setContent('[divider style="fadein" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "fadeoutDivider") {
						tinyMCE.activeEditor.selection.setContent('[divider style="fadeout" margin_top="20px" margin_bottom="20px"]');
					}
					
					
					
					
					// Google Map
					if(id == "googlemap") {
						tinyMCE.activeEditor.selection.setContent('[googlemap title="Envato Office" location="2 Elizabeth St, Melbourne Victoria 3000 Australia" zoom="10" height=250]');
					}
					
					
					
					
					// Heading
					if(id == "title") {
						tinyMCE.activeEditor.selection.setContent('[title type="h2" title="' + sympleDummyContent + '" margin_top="20px;" margin_bottom="20px" text_align="left"]');
					}
					
					
					
					
					// Highlight
					if(id == "blueHighlight") {
						tinyMCE.activeEditor.selection.setContent('[highlight color="blue"]' + sympleDummyContent + '[/highlight]');
					}
					if(id == "grayHighlight") {
						tinyMCE.activeEditor.selection.setContent('[highlight color="gray"]' + sympleDummyContent + '[/highlight]');
					}
					if(id == "greenHighlight") {
						tinyMCE.activeEditor.selection.setContent('[highlight color="green"]' + sympleDummyContent + '[/highlight]');
					}
					if(id == "redHighlight") {
						tinyMCE.activeEditor.selection.setContent('[highlight color="red"]' + sympleDummyContent + '[/highlight]');
					}
					if(id == "yellowHighlight") {
						tinyMCE.activeEditor.selection.setContent('[highlight color="yellow"]' + sympleDummyContent + '[/highlight]');
					}
					if(id == "blackHighlight") {
						tinyMCE.activeEditor.selection.setContent('[highlight color="black"]' + sympleDummyContent + '[/highlight]');
					}	
					if(id == "orangeHighlight") {
						tinyMCE.activeEditor.selection.setContent('[highlight color="orange"]' + sympleDummyContent + '[/highlight]');
					}						

					
					// Pricing
					if(id == "pricing") {
						tinyMCE.activeEditor.selection.setContent('[pricing_table]<br />[pricing size="half" plan="Free" cost="0" currency="$" per="Per month" button_url="#" button_text="Sign Up" button_color="#ff7400" button_border_radius="" button_target="self" button_rel="nofollow" position=""]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/pricing]<br /><br />[pricing size="half" position="last" featured="yes" plan="Basic" cost="19.99" currency="$" per="Per month" button_url="#" button_text="Sign Up" button_color="#ff7400" button_border_radius="" button_target="self" button_rel="nofollow"]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/pricing]<br />[/pricing_table]');
					}
					
					
					
					
					//Spacing
					if(id == "spacing") {
						tinyMCE.activeEditor.selection.setContent('[spacing size="40px"]');
					}
					
					
					
					
					//Social
					if(id == "social") {
						tinyMCE.activeEditor.selection.setContent('[social icon="twitter" version="big or small" url="http://www.twitter.com" title="Follow Us" target="self" rel=""]');
					}
					
					
					
					
					//Skillbar
					// if(id == "skillbar") {
					// 	tinyMCE.activeEditor.selection.setContent('[skillbar title="' + sympleDummyContent + '" percentage="100" color="#6adcfa"]');
					// }
					
					
					
					
					//Tabs
					if(id == "tabs") {
						tinyMCE.activeEditor.selection.setContent('[tabgroup]<br />[tab title="First Tab"]<br />First tab content<br />[/tab]<br />[tab title="Second Tab"]<br />Second Tab Content.<br />[/tab]<br />[tab title="Third Tab"]<br />Third Tab Content.<br />[/tab]<br />[/tabgroup]');
					}
					
					
					
					//Testimonial
					if(id == "testimonial") {
						tinyMCE.activeEditor.selection.setContent('[testimonial by="Your Client"]' + sympleDummyContent + '[/testimonial]');
					}
					
					
					
					//Toggle
					if(id == "toggle") {
						tinyMCE.activeEditor.selection.setContent('[toggle title="This Is Your Toggle Title"]' + sympleDummyContent + '[/toggle]');
					}
					
					
					return false;
				}
			})
		}
	
	});
	tinymce.PluginManager.add("symple_shortcodes", tinymce.plugins.sympleShortcodeMce);
})();