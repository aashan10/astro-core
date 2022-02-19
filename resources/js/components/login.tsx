import React from "react";
const Login = () => {
    return (
        <>
            <div className="h-screen bg-gradient-to-br from-red-500 to-red-500 flex justify-center items-center w-full">
                <form>
                    <div className="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">
                        <div className="space-y-4">
                            <h1 className="text-center text-2xl font-semibold text-gray-600">Login</h1>
                            <div>
                                <label className="block mb-1 text-gray-600 font-semibold">Email</label>
                                <input type="text" className="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
                            </div>
                            <div>
                                <label className="block mb-1 text-gray-600 font-semibold">Password</label>
                                <input type="text" className="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
                            </div>
                        </div>
                        <button className="mt-4 w-full font-bold bg-red-500 text-indigo-100 py-2 rounded-md text-lg tracking-wide">Login</button>
                    </div>
                </form>
            </div>

        </>
    )
}

export default Login;