module.exports = function(grunt) {
    
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            options: {
                separator: ';\n',
                stripBanners: true,
                banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
                '<%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            javascript: {
                src: [
                    'lib/jquery/dist/jquery.min.js',
                    'lib/bootstrap/dist/js/bootstrap.min.js',
                    'lib/angular/angular.min.js',
                    'lib/angular-sanitize/angular-sanitize.min.js',
                    'lib/angular-route/angular-route.min.js',
                    'lib/angular-resource/angular-resource.min.js',
                    'js/services.js',
                    'js/app.js',
                    'js/controllers/main_controller.js',
                    'js/controllers/view_controller.js',
                    'js/controllers/edit_controller.js'
                ],
                dest: 'js/dist/app_all.js'
            }
        },
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build: {
                src: 'js/dist/app_all.js',
                dest: 'js/dist/app_all.min.js'
            }
        },
        watch: {
            javascript: {
                files: ['js/app.js','js/services.js','js/controllers/*'],
                tasks: ['concat','uglify']
            }
        }
    });
    
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-concat-css');
    grunt.loadNpmTasks('grunt-contrib-watch');
    
    grunt.registerTask('default', ['concat','uglify']);
    
};
