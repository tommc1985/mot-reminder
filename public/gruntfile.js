// To check for new package updates see https://www.npmjs.com/package/npm-check-updates
module.exports = function (grunt) {

    // Configurable options
    var config = {
        sassPath:       'assets/sass',
        cssPath:        'assets/styles',
        imagesPath:     'assets/images',
        jsPath:         'assets/scripts',
        sourcemap:      false,
        outputStyle:    'expanded' // Used for SASS, expanded is for development, compressed is for live
    };

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),


        // Project options
        config: config,

        // Compass options used to compile SASS into CSS
        compass: {
            dev: {
                options: {
                    sassDir: '<%= config.sassPath %>',
                    cssDir: './',
                    environment: 'development',
                    sourcemap: '<%= config.sourcemap %>'
                }
            },
            live: {
                options: {
                    sassDir: '<%= config.sassPath %>',
                    cssDir: './',
                    environment: 'production'
                }
            }
        },



        // Compile SASS using grunt-sass(libsass)
        sass: {
            options: {
                sourceMap: '<%= config.sourcemap %>',
                outputStyle: '<%= config.outputStyle %>'
            },
            dist: {
                files: {
                    './style.css': '<%= config.sassPath %>/style.scss'
                }
            }
        },


        // Add vendor prefixed styles
        autoprefixer: {
            options: {
                browsers: ['last 2 version', 'last 4 Explorer versions'],
                map: '<%= config.sourcemap %>'
            },
            dist: {
                files: [{
                    expand: true,
                    cwd: '',
                    src: 'style.css',
                    dest: ''
                }]
            }
        },

        // Watches files for changes then compiles and reloads the browser
        watch: {
            options: {
                livereload: true
            },

            html: {
                files: ['index.php', 'templates/template.php', 'templates/template-header.php', 'templates/template-footer.php'],
            },

            // compass: {
            //     files: ['<%= config.sassPath %>/{,*/}*.{scss,sass}'],
            //     tasks: ['compass:dev', 'autoprefixer', 'notify:compass']
            // },

            sass: {
                files: ['<%= config.sassPath %>/{,*/}*.{scss,sass}'],
                tasks: ['sass', 'autoprefixer', 'notify:sass']
            },

            jshint: {
                files: ['<%= config.jsPath %>/{main,admin}.js'],
                tasks: ['jshint']
            }

        },

        browserSync: {
            dev: {
                bsFiles: {
                    src : 'style.css'
                },
                options: {
                    proxy: "CLIENTLOCALADDRESS.local",
                    watchTask: true
                }
            }
        },

        // Checks JS file for errors
        jshint: {
            all: ['<%= config.jsPath %>/{main,admin}.js'],
            options: {
                '-W099': true, // Stops mixed tabs and spaces error
            },
        },

        // Clean any pre-commit hooks in .git/hooks directory
        clean: {
            precommit: ['../../.git/hooks/pre-commit'],
            pull: ['../../.git/hooks/post-merge']
        },

        shell: {
            precommit: {
                command: 'cp git-hooks/pre-commit ../.git/hooks/'
            },
            pull: {
                command: 'cp git-hooks/post-merge ../.git/hooks/'
            }
        },

        notify: {
            compass: {
              options: {
                title: 'Hardy Athletic Golf Society',
                message: 'Compass compiled',
              }
            },

            sass: {
              options: {
                title: 'Hardy Athletic Golf Society',
                message: 'SASS compiled',
              }
            }
        },


        // Reads the js files from the specified html file and generates the concat & uglify config, run with grunt buildJS
        useminPrepare: {
            html: 'templates/template-footer.php'
        },

        // Conatenates files
        concat: {
            build: {
                dest: 'assets/scripts/plugins.js',
                src:
                [
                'assets/scripts/jquery.cycle2.js',
                'assets/scripts/jquery.cycle2.swipe.min.js',
                'assets/scripts/bootstrapValidator.min.js',
                'assets/scripts/respond.min.js',
                'assets/scripts/cookies.min.js',
                'bower_components/Slidebars/dist/slidebars.min.js',
                'bower_components/flexnav/js/jquery.flexnav.js',
                'bower_components/ddsmoothmenu/ddsmoothmenu.js'
                ],
            },
        },

        // Minifies JS files
        uglify: {
            build: {
                files: {
                    '<%= config.jsPath %>/plugins.min.js': ['<%= config.jsPath %>/plugins.js'],
                    '<%= config.jsPath %>/main.min.js': ['<%= config.jsPath %>/main.js'],
                    '<%= config.jsPath %>/admin.min.js': ['<%= config.jsPath %>/admin.js'],
                    '<%= config.jsPath %>/modernizr.min.js': ['<%= config.jsPath %>/modernizr.js']
                }
            }
        },

        // Minifies CSS files
        cssmin: {
            build: {
                files: {
                    'style.min.css': ['style.css'],
                    'admin.min.css': ['admin.css']
                }
            }
        }

    });

    // Load grunt tasks automatically
    require('load-grunt-tasks')(grunt);

    // Default task(s)
    grunt.registerTask('default', ['sass', 'autoprefixer']);
    grunt.registerTask('watchsync', ['browserSync', 'watch']);
    grunt.registerTask('setup', ['clean:precommit','shell:precommit','clean:pull','shell:pull']);
    grunt.registerTask('live', ['jshint', 'uglify', 'sass', 'autoprefixer', 'cssmin']);
    grunt.registerTask('buildJS', ['useminPrepare','concat:generated']);
};