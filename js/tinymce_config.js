tinymce.PluginManager.add('customFields', function (editor, url) {
    var tbltrainee = [
        {
            text: 'nom',
            content: 't.lname',
            onclick: function () {
                editor.insertContent(this.settings.content);
            }
        },
        {
            text: 'prenom',
            content: 't.fname',
            onclick: function () {
                editor.insertContent(this.settings.content);
            }
        },
        {
            text: 'cin',
            content: 't.cin',
            onclick: function () {
                editor.insertContent(this.settings.content);
            }
        },
        {
            text: 'email',
            content: 't.email',
            onclick: function () {
                editor.insertContent(this.settings.content);
            }
        }
    ];
    var tbltrainship = [
        {
            text: 'date début',
            content: 's.date_start',
            onclick: function () {
                editor.insertContent(this.settings.content)
            }
        },
        {
            text: 'date fin',
            content: 's.date_end',
            onclick: function () {
                editor.insertContent(this.settings.content)
            }
        },
        {
            text: 'type',
            content: 'i.type',
            onclick: function () {
                editor.insertContent(this.settings.content)
            }
        }
    ];
    var tbldiv = [
        {
            text: 'prénom',
            content: 'div.fname',
            onclick: function () {
                editor.insertContent(this.settings.content)
            }
        },
        {
            text: 'nom',
            content: 'div.lname',
            onclick: function () {
                editor.insertContent(this.settings.content)
            }
        },
        {
            text: 'fonction',
            content: 'div.function',
            onclick: function () {
                editor.insertContent(this.settings.content)
            }
        }
    ];
    var tbldriver = [{
        text: 'Date courant', content: '@currentdate', onclick: function () {
            editor.insertContent(this.settings.content);
        }
    }];
    var tblestablishment = [{
        text: 'Nom', content: 'sc.name', onclick: function () {
            editor.insertContent(this.settings.content);
        }
    }];
    var group = ['Stagiaire', 'Stage', 'Etablissement Scolaire', 'Divisionnaire', 'Paramètres date'];
    var tbl = [tbltrainee, tbltrainship, tblestablishment, tbldiv, tbldriver];
    var menuItems = [];
    function createTempMenu() {
        for (var i = 0; i < group.length; i++) {
            menuItems[i] = {
                text: group[i],
                menu: tbl[i]
            };
        }
        return menuItems;
    }
    editor.addButton('customFields', {
        type: 'menubutton',
        text: 'Champs',
        icon: false,
        menu: createTempMenu(editor)
    });
    editor.addMenuItem('customFields', {});
})
tinyMCE.PluginManager.add('stylebuttons', function (editor, url) {
    ['pre', 'p', 'code', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'].forEach(function (name) {
        editor.addButton("style-" + name, {
            tooltip: "Toggle " + name,
            text: name.toUpperCase(),
            onClick: function () {
                editor.execCommand('mceToggleFormat', false, name);
            },
            onPostRender: function () {
                var self = this, setup = function () {
                    editor.formatter.formatChanged(name, function (state) {
                        self.active(state);
                    });
                };
                editor.formatter ? setup() : editor.on('init', setup);
            }
        })
    });
});