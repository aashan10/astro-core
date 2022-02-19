import React from "react";
import moment from 'moment';
const Newsletter = () => {

    const date = moment().year().toString();

    return (
        <>
            <div className="flex justify-around">
                <span className={'font-bold'}>&copy; Copyright { date } <a className={'text-red-500'} href="#">Astro Core Inc.</a></span>
            </div>
            <div className="flex flex-col mt-5">
                <label htmlFor="newsletter" className="mb-2 font-bold text-left">Subscribe to our Newsletter</label>
                <div className="flex flex-row w-full rounded-full overflow-hidden">
                    <input type="email" id="newsletter" className="border-r-0 border-0 pl-6 p-2 bg-white text-black w-full"
                           placeholder="Email"/>
                    <button
                        className="p-3 font-semibold border border-l-0 border-red-500 border-l-0 bg-red-500 hover:bg-red-700 hover:border-red-700">Subscribe
                    </button>
                </div>
            </div>
        </>
    )
}

export default Newsletter;