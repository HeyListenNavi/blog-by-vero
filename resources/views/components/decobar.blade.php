<x-window title="deco bar" class="decobar" :buttons="['close']">
  <div class="decorations">
      <div class="blinkies">
          <img loading="lazy" src="{{ Vite::blinkie('trans-lesbians.gif') }}"/>
          <img loading="lazy" src="{{ Vite::blinkie('bring-up-my-post.gif') }}"/>
          <img loading="lazy" src="{{ Vite::blinkie('i-view-source.gif') }}"/>
          <img loading="lazy" src="{{ Vite::blinkie('mitski.webp') }}"/>
          <img loading="lazy" src="{{ Vite::blinkie('bubblegum-bitch.gif') }}"/>
          <img loading="lazy" src="{{ Vite::blinkie('reflection-of-venus.gif') }}"/>
      </div>
      <div class="stamps">
          <img loading="lazy" src="{{ Vite::stamp('nintendo-64-record.gif') }}"/>
          <img loading="lazy" src="{{ Vite::stamp('gameboy.gif') }}"/>
          <img loading="lazy" src="{{ Vite::stamp('404-not-found.gif') }}"/>
      </div>
      <div class="buttons">
          <img loading="lazy" src="{{ Vite::button('best-viewed-with-eyes.gif') }}"/>
          <img loading="lazy" src="{{ Vite::button('web-design-passion.gif') }}"/>
          <img loading="lazy" src="{{ Vite::button('ao3-freak.gif') }}"/>
          <img loading="lazy" src="{{ Vite::button('parental-advisory.gif') }}"/>
          <img loading="lazy" src="{{ Vite::button('queer-coded.jpg') }}"/>
          <img loading="lazy" src="{{ Vite::button('virtual-diva.jpg') }}"/>
      </div>
      <img loading="lazy" src="{{ Vite::image('feel-free-to-make-out.jpg') }}"/>
  </div>
</x-window>