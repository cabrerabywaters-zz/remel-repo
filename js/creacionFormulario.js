var editor; // use a global for the submit and return data rendering in the examples

			$(document).ready(function() {
				// Create the form
				var 
				editor = new $.fn.dataTable.Editor( {
					"ajaxUrl": "php/browsers.php",
					"domTable": "#example",
					"fields": [ {
							"label": "Browser:",
							"name": "browser"
						}, {
							"label": "Rendering engine:",
							"name": "engine"
						}, {
							"label": "Platform:",
							"name": "platform"
						}, {
							"label": "Version:",
							"name": "version"
						}, {
							"label": "CSS grade:",
							"name": "grade"
						}
					]
				} );

				// New record
				$('a.editor_create').on('click', function (e) {
					e.preventDefault();

					editor.create(
						'Create new record',
						{ "label": "Add", "fn": function () { editor.submit() } }
					);
				} );

				// Edit record
				$('#example').on('click', 'a.editor_edit', function (e) {
					e.preventDefault();

					editor.edit(
						$(this).parents('tr')[0],
						'Edit record',
						{ "label": "Update", "fn": function () { editor.submit() } }
					);
				} );

				// Delete a record (without asking a user for confirmation)
				$('#example').on('click', 'a.editor_remove', function (e) {
					e.preventDefault();

					editor.remove( $(this).parents('tr')[0], '123', false, false );
					editor.submit();
				} );

				// DataTables init
				$('#example').dataTable( {
					"sDom": "Tfrtip",
					"sAjaxSource": "php/browsers.php",
					"aoColumns": [
						{ "mData": "browser" },
						{ "mData": "engine" },
						{ "mData": "platform" },
						{ "mData": "grade", "sClass": "center" },
						{
							"mData": null, 
							"sClass": "center",
							"sDefaultContent": '<a href="" class="editor_edit">Edit</a> / <a href="" class="editor_remove">Delete</a>'
						}
					]
				} );
			} );