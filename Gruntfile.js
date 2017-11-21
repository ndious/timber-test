const filesWatched = [
  '*.php',
  '**/*.php',
  '*.js', 
  '**/*.js', 
  '*.json', 
  '**/*.json', 
  '*.yml',
  '**/*.yml'
];

module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      upload: {
        files: filesWatched,
        tasks: ['exec:rsync'],
        options: {
          spawn: false,
        }
      },
      server: {
        files: filesWatched,
        tasks: ['exec:reload'],
        options: {
          spawn: false,
        }
      }
    },
    exec: {
        rsync: 'rsync -auvz --delete -e "ssh" ./ root@dev.tiim.beer:/home/tiimber',
        reload: 'bash ' + __dirname + '/tiimber reload'
    }
  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-exec');

  grunt.registerTask('server', ['watch:upload']);
  grunt.registerTask('default', ['watch:server']);
};