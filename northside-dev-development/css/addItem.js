$(document).ready(function(){
						
						//Creates the tabs to be used on different pages.
						$(function() {
							$( "#tabs" ).tabs();
							});
						

						//This adds items or materials on add buttons that are in tabbed pages	
						$('input[name=add]').click(function(){
							var activeIndex = $("#tabs").tabs('option', 'active');
							activeIndex++; //Make it start at 1, not 0
							
						
								$('#tabs-'+activeIndex + ' .selectItems').first().clone().insertAfter('#tabs-'+activeIndex + ' .selectItems:last');
								$('#tabs-'+activeIndex + ' .selectItems:last input').val(1); //make sure default value of quantity is 1
							

							
							
						});
						$('input[name=delete]').click(function(){
							var activeIndex = $("#tabs").tabs('option', 'active');
								activeIndex++; //Make it start at 1, not 0
							
									if ($('#tabs-'+activeIndex + ' .selectItems').size() > 1){
										$('#tabs-'+activeIndex + ' .selectItems').last().remove();
									}
								
					

							
							
						});

								
								//This also adds items or materials, but it is used on pages without tabs.
						$('input[name=otherAdd]').click(function(){
							
							$('.selectItems').first().clone().insertAfter('.selectItems:last');
							
							

							
							
						});
						
						
					});
				
