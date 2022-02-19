import React from 'react';

const Register = () => {
    return (
        <>
            <form className="flex flex-1 flex-col" method="post" action="/register">
                <div className="mt-5 flex flex-1 flex-col md:flex-row py-2">
                    <label className="flex mt-5 flex-1 flex-col">
                        <span className="font-bold mb-2 text-gray-800">First Name</span>
                        <input type="text" name="firstName" placeholder="First Name"
                               className="flex flex-1 bg-gray-100 rounded py-2 px-4"/>
                    </label>
                    <div className="flex-1"></div>

                    <label className="flex mt-5 flex-1 flex-col">
                        <span className="font-bold mb-2 text-gray-800">Last Name</span>
                        <input type="text" name="lastName" placeholder="Last Name"
                               className="flex flex-1 bg-gray-100 rounded py-2 px-4"/>
                    </label>
                </div>

                <div className="flex flex-1 flex-row py-2">
                    <label className="flex flex-1 flex-col">
                        <span className="font-bold mb-2 text-gray-800">Email</span>
                        <input type="text" name="email" placeholder="Email"
                               className="flex flex-1 bg-gray-100 rounded py-2 px-4"/>
                    </label>
                </div>

                <div className="flex flex-1 flex-row py-2">
                    <label className="flex flex-1 flex-col">
                        <span className="font-bold mb-2 text-gray-800">Password</span>
                        <input type="password" name="password" placeholder="Password"
                               className="flex flex-1 bg-gray-100 rounded py-2 px-4"/>
                    </label>
                </div>

                <div className="flex flex-1 flex-row py-2">
                    <label className="flex flex-1 flex-col">
                        <span className="font-bold mb-2 text-gray-800">Repeat Password</span>
                        <input type="password" name="repeatPassword" placeholder="Repeat Password"
                               className="flex flex-1 bg-gray-100 rounded py-2 px-4"/>
                    </label>
                </div>

                <div className="flex flex-1 flex-row py-2">
                    <button type="submit"
                            className=" inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-500 hover:bg-red-700">
                        Register
                    </button>
                </div>
            </form>
        </>
    )
}

export default Register;