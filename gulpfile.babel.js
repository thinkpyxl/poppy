import { series, parallel } from 'gulp';
import { scripts, styles, fonts, images, svgs, sprite, clean, monitor, vendors, blockScripts, blockStyles } from './tools/index';
import { serve } from './tools/tasks/serve';

const start = parallel(
  serve,
  monitor
);

const build = series(
  clean,
  series(
    styles,
    scripts,
  )
);

const prod = series(
  clean,
  parallel(
    scripts,
    styles,
  )
);

export { build, start, prod, styles, scripts };