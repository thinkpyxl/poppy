import { series, watch } from 'gulp';
import { quit, reload } from './serve';
import { scripts, styles } from '../index';

function monitor (cb) {
  watch(
    [
      `./tools/**/*`,
      `./gulpfile.babel.js`,
      `./postcss.config.js`,
      `./babel.config.js`,
      `./package.json`,
    ],
    quit
  );
  watch(
    [
      `./src/**/*.js`,
    ],
    series(
      scripts,
      reload
    )
  );
  watch(
    [
      `./src/**/*.scss`,
    ],
    series(
      styles,
    )
  );
  cb();
}

export { monitor };