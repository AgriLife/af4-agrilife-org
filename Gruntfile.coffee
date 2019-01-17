module.exports = (grunt) ->
  @initConfig
    pkg: @file.readJSON('package.json')
    watch:
      files: [
        'css/src/*.scss'
      ]
      tasks: ['sasslint', 'sass:dev']
    postcss:
      pkg:
        options:
          processors: [
            require('autoprefixer')({browsers: ['last 2 versions','ie > 9']})
          ]
          failOnError: true
        files:
          'css/admin.css':           'css/admin.css'
          'css/agrilife.css':        'css/agrilife.css'
          'css/home.css':            'css/home.css'
          'css/af4-style-guide.css': 'css/af4-style-guide.css'
      dev:
        options:
          map: true
          processors: [
            require('autoprefixer')({browsers: ['last 2 versions','ie > 9']})
          ]
          failOnError: true
        files:
          'css/admin.css':           'css/admin.css'
          'css/agrilife.css':        'css/agrilife.css'
          'css/home.css':            'css/home.css'
          'css/af4-style-guide.css': 'css/af4-style-guide.css'
    sass:
      pkg:
        options:
          loadPath: 'node_modules/foundation-sites/scss'
          sourcemap: 'none'
          style: 'compressed'
          precision: 2
        files:
          'css/admin.css':           'css/src/admin.scss'
          'css/agrilife.css':        'css/src/agrilife.scss'
          'css/home.css':            'css/src/home.scss'
          'css/af4-style-guide.css': 'css/src/af4-style-guide.scss'
      dev:
        options:
          loadPath: 'node_modules/foundation-sites/scss'
          style: 'expanded'
          precision: 2
          trace: true
        files:
          'css/admin.css':           'css/src/admin.scss'
          'css/agrilife.css':        'css/src/agrilife.scss'
          'css/home.css':            'css/src/home.scss'
          'css/af4-style-guide.css': 'css/src/af4-style-guide.scss'
    sasslint:
      options:
        configFile: '.sass-lint.yaml'
      target: ['scss/**/*.s+(a|c)ss']
    compress:
      main:
        options:
          archive: 'af4-agrilife-org.zip'
        files: [
          {src: ['css/*.css']},
          {src: ['fields/**']},
          {src: ['images/**']},
          {src: ['src/*.php']},
          {src: ['templates/*.php']},
          {src: ['vendor/autoload.php', 'vendor/composer/**']}
          {src: ['af4-agrilife-org.php']},
          {src: ['readme.md']},
        ]

  @loadNpmTasks 'grunt-contrib-sass'
  @loadNpmTasks 'grunt-contrib-watch'
  @loadNpmTasks 'grunt-contrib-compress'
  @loadNpmTasks 'grunt-sass-lint'
  @loadNpmTasks 'grunt-postcss'

  @registerTask 'default', ['sass:pkg', 'postcss:pkg']
  @registerTask 'develop', ['sasslint', 'sass:dev', 'postcss:dev']
    done = @async()


    return

  @event.on 'watch', (action, filepath) =>
    @log.writeln('#{filepath} has #{action}')
