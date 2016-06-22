module.exports = function(grunt) {
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-shell');
  grunt.initConfig({
    watch: {
      php: {
        options: {
          event: 'changed',
          spawn: false
        },
        files: ['src/**/*.php'],
        tasks: 'shell:phpunit'
      }
    },
    shell: {
      phpunit: {
        command: 'vendor/bin/phpunit'
      }
    }
  });

  grunt.registerTask('default', ['watch']);
};
