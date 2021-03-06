import { throttle } from 'lodash';

const scroll = ({ measurement = 'percent', value = '50' }, popup) => {
  const handleScroll = ({ target }) => {
    const {
      documentElement
    } = target;
    const {
      scrollTop,
      scrollHeight,
      clientHeight
    } = documentElement;
    const percent = ((scrollTop / (scrollHeight - clientHeight)) * 100);
  
    if ((measurement === 'percent' && percent >= parseInt(value)) || (measurement !== 'percent' && scrollTop >= parseInt(value))) {
      popup.classList.remove('inactive');
    } else {
      popup.classList.add('inactive');

      if (! popup.classList.contains('peek--false')) {
        popup.classList.add('peek');
      }
    }
  };

  window.addEventListener(
    'scroll',
    throttle(handleScroll, 200)
  );
}

export default scroll;