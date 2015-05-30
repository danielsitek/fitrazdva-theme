/**!
 *
 * FoundationPress Gruntfile.js
 *
 * @version:   v0.1.0
 * @author:    Daniel Sitek
 * @updated:   05/07/2015
 *
 */

var path = require('path');

module.exports = function(grunt) {
	'use strict';

	// time
	require('time-grunt')(grunt);

	grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
		theme: grunt.file.readJSON('theme.json'),

		banner: [
            '/**!',
            ' * <%= theme.title %>',
            ' * <%= theme.description %>',
            ' * ',
            ' * @version:       v<%= theme.version %>',
            ' * @updated:       <%= grunt.template.today("dd-mm-yyyy") %>',
            ' * @license:       <%= theme.license.name %>',
            ' */',
            ' '
        ].join('\n'),

        options: {
            folders: {
                bower: 'bower_components/',
                dev: 'assets/',
                production: 'theme-content/dist/'
            }
        },


        usebanner: {
            css: {
                options: {
                    position: 'top',
                    banner: '<%= banner %>',
                    linebreak: false
                },
                files: {
                    src: [
                        '<%= options.folders.production %>styles/{main,main.min}.css',
                        '<%= options.folders.production %>styles/{editor-style,editor-style.min}.css'
                    ]
                }
            },
            js: {
                options: {
                    position: 'top',
                    banner: '<%= banner %>',
                    linebreak: false
                },
                files: {
                    src: [
                        '<%= options.folders.production %>scripts/{main,main.min}.js'
                    ]
                }
            }
        },

        clean: ['<%= options.folders.production %>'],

		sass: {
            options: {
                precision: 4,
                includePaths: ['<%= options.folders.bower %>', '<%= options.folders.dev %>styles'],
                outFile: '<%= options.folders.production %>styles/main.css',
                sourceMap: true,
                sourceMapContents: true
            },
            dist: {
                files: {
                    '<%= options.folders.production %>styles/main.css': '<%= options.folders.dev %>styles/main.scss',
                    '<%= options.folders.production %>styles/editor-style.css': '<%= options.folders.dev %>styles/editor-style.scss',
                }
            }
        },

        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 8', 'ie 9', 'android 2.3', 'android 4', 'opera 12'],
                map: true
            },
            main: {
                flatten: true,
                src: '<%= options.folders.production %>styles/main.css'
            },
            editor_style: {
                flatten: true,
                src: '<%= options.folders.production %>styles/editor-style.css'
            }
        },

        csscomb: {
            options: {
                "always-semicolon": true,
                "block-indent": 2,
                "color-case": "lower",
                "combinator-space": true,
                "element-case": "lower",
                "eof-newline": true,
                "leading-zero": false,
                "remove-empty-rulesets": true,
                "rule-indent": 2,
                "stick-brace": " ",
                "strip-spaces": true,
                "unitless-zero": true,
                "vendor-prefix-align": true
            },
            build: {
                expand: true,
                cwd: '<%= options.folders.production %>styles/main.css',
                src: '*.css',
                dest: '<%= options.folders.production %>styles/main.css'
            }
        },

        cssmin: {
            project: {
                files: {
                    '<%= options.folders.production %>styles/main.min.css': ['<%= options.folders.production %>styles/main.css'],
                    '<%= options.folders.production %>styles/editor-style.min.css': ['<%= options.folders.production %>styles/editor-style.css']
                }
            }
        },

        shell: {
            // #### Run bower install
            // Used as part of `grunt init`. See the section on [Building Assets](#building%20assets) for more
            // information.
            bower: {
                command: path.resolve('./node_modules/.bin/bower --allow-root install'),
                options: {
                    stdout: true,
                    stdin: false
                }
            },
            // Package theme-content into zip file.
            make_zip: {
                command: 'zip -r zip/<%= theme.name %>-<%= theme.version %>.zip theme-content/'
            }
        },

        jshint: {
            options: {
                jshintrc: true,
                reporter: require('jshint-stylish')
            },
            all: [
                '<%= options.folders.dev %>scripts/main.js',
                '<%= options.folders.dev %>scripts/concat/**.js',
                'Gruntfile.js',
                'bower.json',
                'package.json'
            ]
        },

        jscs: {
            src: [
                '<%= options.folders.dev %>scripts/main.js',
                '<%= options.folders.dev %>scripts/concat/**.js'
            ],
            options: {
                config: ".jscsrc"
            }
        },

        copy: {
            images: {
                expand: true,
                cwd: '<%= options.folders.dev %>images',
                src: '**',
                dest: '<%= options.folders.production %>images'
            },

            fontawesome: {
                expand: true,
                nonull: true,
                cwd: '<%= options.folders.bower %>font-awesome/fonts',
                src: ['fontawesome-webfont.*'],
                dest: '<%= options.folders.production %>fonts'
            },

            typicons: {
                expand: true,
                nonull: true,
                cwd: '<%= options.folders.bower %>typicons/src/font',
                src: ['*.eot', '*.svg', '*.ttf', '*.woff'],
                dest: '<%= options.folders.production %>fonts'
            }
        },

		concat: {
			options: {
				separator: ';\n',
			},
			javascript: {
				src: [

				'<%= options.folders.bower %>modernizr/modernizr.js',
				'<%= options.folders.bower %>jquery/dist/jquery.js',
                '<%= options.folders.bower %>jquery-placeholder/jquery.placeholder.js',
                '<%= options.folders.dev %>scripts/lib/*.js',

                // Foundation core
                '<%= options.folders.bower %>foundation/js/foundation/foundation.js',

                // Pick the componenets you need in your project
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.abide.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.accordion.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.alert.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.clearing.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.dropdown.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.equalizer.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.interchange.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.joyride.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.magellan.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.offcanvas.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.orbit.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.reveal.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.slider.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.tab.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.tooltip.js',
                // '<%= options.folders.bower %>foundation/js/foundation/foundation.topbar.js',

                '<%= options.folders.bower %>salvattore/dist/salvattore.js',

                // Include your own custom scripts (located in the custom folder)
                '<%= options.folders.dev %>scripts/concat/*.js',
				'<%= options.folders.dev %>scripts/main.js'

				],
				// Finally, concatinate all the files above into one single file
				dest: '<%= options.folders.production %>scripts/main.js',
			},
            javascriptIE: {
                src: [
                    '<%= options.folders.bower %>html5shiv/dist/html5shiv.min.js',
                    '<%= options.folders.bower %>respond/dest/respond.min.js',
                    '<%= options.folders.bower %>REM-unit-polyfill/js/rem.min.js'
                ],
                dest: '<%= options.folders.production %>scripts/main-ie.js'
            },
		},

		uglify: {
			options: {
                sourceMap: true
            },
            dist: {
				files: {
					// Shrink the file size by removing spaces
					'<%= options.folders.production %>scripts/main.min.js': ['<%= options.folders.production %>scripts/main.js']
				}
			}
		},

		watch: {
            grunt: {
                files: ['Gruntfile.js'],
                options: {
                    reload: true
                }
            },

            js: {
                files: '<%= options.folders.dev %>scripts/**/*.js',
                tasks: ['jshint', 'concat:javascript'],
				options: {
					livereload: 13702,
				}
            },

            sass: {
                files: '<%= options.folders.dev %>styles/**/*.scss',
                tasks: ['sass', 'autoprefixer', 'csscomb'],
				options: {
					livereload: 13702,
				}
            },

            images: {
                files: '<%= options.folders.dev %>images/**',
                tasks: ['copy:images'],
				options: {
					livereload: 13702,
				}
            },

			all: {
				files: '**/*.php',
				options: {
					livereload: 13702,
				}
			}
        }
	});


    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-banner');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-csscomb');
    grunt.loadNpmTasks("grunt-jscs");
	grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-shell');


	grunt.registerTask(
        'default',
        ['jshint', 'jscs']
    );

    grunt.registerTask(
        'build-css',
        'Build styles for development',
        ['sass', 'autoprefixer', 'csscomb', 'cssmin', 'usebanner:css']
    );

    grunt.registerTask(
        'build-js',
        'JSHint, concat and minify java script files for development',
        ['jshint', 'concat:javascript', 'uglify', 'usebanner:js']
    );

    grunt.registerTask(
        'build-assets',
        'Minify and copy images and fonts.',
        ['copy:images', 'copy:typicons']
    );

    grunt.registerTask(
        'build',
        'Build whole project',
        ['clean', 'build-css', 'build-js', 'build-assets']
    );

    // ### Init assets
    // `grunt init` - will run an initial asset build for you
    //
    // Grunt init runs `bower install` as well as the standard asset build tasks which occur when you run just
    // `grunt`. This fetches the latest client side dependencies, and moves them into their proper homes.
    //
    // This task is very important, and should always be run and when fetching down an updated code base just after
    // running `npm install`.
    //
    // `bower` does have some quirks, such as not running as root. If you have problems please try running
    // `grunt init --verbose` to see if there are any errors.
    grunt.registerTask(
        'init',
        'Prepare the project for development',
        ['shell:bower', 'concat:javascriptIE', 'build']
    );
};